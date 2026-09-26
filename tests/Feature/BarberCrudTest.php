<?php

namespace Tests\Feature;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BarberCrudTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'Admin Heritage',
            'email' => 'admin@heritagebarbershop.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function test_guest_cannot_access_barbers(): void
    {
        $response = $this->get('/admin/barbers');
        $response->assertRedirect('/login');

        $response = $this->get('/admin/barbers/create');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_barbers_list(): void
    {
        Barber::create([
            'name' => 'Mas Dani',
            'role' => 'Senior Barber',
            'instagram_handle' => 'dani_cuts',
        ]);

        $response = $this->actingAs($this->user)->get('/admin/barbers');

        $response->assertStatus(200);
        $response->assertSee('Tim Kapster Heritage');
        $response->assertSee('Mas Dani');
        $response->assertSee('Senior Barber');
        $response->assertSee('@dani_cuts');
    }

    public function test_authenticated_user_can_view_create_page(): void
    {
        $response = $this->actingAs($this->user)->get('/admin/barbers/create');

        $response->assertStatus(200);
        $response->assertSee('Formulir Kapster Baru');
        $response->assertSee('Nama Lengkap Kapster');
        $response->assertSee('Peran / Spesialisasi');
    }

    public function test_authenticated_user_can_store_barber(): void
    {
        $response = $this->actingAs($this->user)->post('/admin/barbers', [
            'name' => 'Mas Eko',
            'role' => 'Master Stylist',
            'instagram_handle' => 'eko_fade',
            'image_url' => 'https://example.com/eko.jpg',
        ]);

        $response->assertRedirect(route('admin.barbers.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('barbers', [
            'name' => 'Mas Eko',
            'role' => 'Master Stylist',
            'instagram_handle' => 'eko_fade',
        ]);
    }

    public function test_authenticated_user_can_upload_barber_image(): void
    {
        $file = UploadedFile::fake()->image('barber.jpg', 800, 800);

        $response = $this->actingAs($this->user)->post('/admin/barbers', [
            'name' => 'Mas Bagus',
            'role' => 'Senior Colorist',
            'instagram_handle' => 'bagus_color',
            'image' => $file,
        ]);

        $response->assertRedirect(route('admin.barbers.index'));
        $response->assertSessionHas('success');

        $barber = Barber::where('name', 'Mas Bagus')->first();
        $this->assertNotNull($barber);
        $this->assertNotNull($barber->image_url);
        $this->assertStringStartsWith('/storage/barbers/', $barber->image_url);
    }

    public function test_store_barber_validation(): void
    {
        $response = $this->actingAs($this->user)->post('/admin/barbers', [
            'name' => '',
            'role' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'role']);
    }

    public function test_authenticated_user_can_view_edit_page(): void
    {
        $barber = Barber::create([
            'name' => 'Mas Doni',
            'role' => 'Junior Barber',
            'instagram_handle' => 'doni_cuts',
        ]);

        $response = $this->actingAs($this->user)->get("/admin/barbers/{$barber->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Mas Doni');
        $response->assertSee('Junior Barber');
    }

    public function test_authenticated_user_can_update_barber(): void
    {
        $barber = Barber::create([
            'name' => 'Mas Doni',
            'role' => 'Junior Barber',
            'instagram_handle' => 'doni_cuts',
        ]);

        $response = $this->actingAs($this->user)->put("/admin/barbers/{$barber->id}", [
            'name' => 'Mas Doni Prabowo',
            'role' => 'Senior Barber',
            'instagram_handle' => 'doni_prabowo',
            'image_url' => 'https://example.com/doni.jpg',
        ]);

        $response->assertRedirect(route('admin.barbers.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('barbers', [
            'id' => $barber->id,
            'name' => 'Mas Doni Prabowo',
            'role' => 'Senior Barber',
        ]);
    }

    public function test_authenticated_user_can_delete_barber(): void
    {
        $barber = Barber::create([
            'name' => 'Barber to Delete',
            'role' => 'Apprentice',
        ]);

        $response = $this->actingAs($this->user)->delete("/admin/barbers/{$barber->id}");

        $response->assertRedirect(route('admin.barbers.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('barbers', [
            'id' => $barber->id,
        ]);
    }
}

