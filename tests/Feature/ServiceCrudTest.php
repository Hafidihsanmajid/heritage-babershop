<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ServiceCrudTest extends TestCase
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

    public function test_guest_cannot_access_services(): void
    {
        $response = $this->get('/admin/services');
        $response->assertRedirect('/login');

        $response = $this->get('/admin/services/create');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_services_list(): void
    {
        Service::create([
            'title' => 'Buzz Cut',
            'description' => 'Simple buzz cut',
            'price' => 35000,
        ]);

        $response = $this->actingAs($this->user)->get('/admin/services');

        $response->assertStatus(200);
        $response->assertSee('Daftar Layanan');
        $response->assertSee('Buzz Cut');
        $response->assertSee('Rp 35.000');
    }

    public function test_authenticated_user_can_view_create_page(): void
    {
        $response = $this->actingAs($this->user)->get('/admin/services/create');

        $response->assertStatus(200);
        $response->assertSee('Formulir Layanan Baru');
        $response->assertSee('Nama Layanan');
        $response->assertSee('Harga Layanan (IDR)');
    }

    public function test_authenticated_user_can_store_service(): void
    {
        $response = $this->actingAs($this->user)->post('/admin/services', [
            'title' => 'Gentlemen Cut & Wash',
            'description' => 'Potongan rapi dan keramas',
            'price' => 50000,
            'image_url' => 'https://example.com/image.jpg',
        ]);

        $response->assertRedirect(route('admin.services.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('services', [
            'title' => 'Gentlemen Cut & Wash',
            'price' => 50000,
        ]);
    }

    public function test_authenticated_user_can_upload_service_image(): void
    {
        $file = UploadedFile::fake()->image('haircut.jpg', 1200, 800);

        $response = $this->actingAs($this->user)->post('/admin/services', [
            'title' => 'Gentlemen Luxury Fade',
            'description' => 'Potongan fade mewah',
            'price' => 75000,
            'image' => $file,
        ]);

        $response->assertRedirect(route('admin.services.index'));
        $response->assertSessionHas('success');

        $service = Service::where('title', 'Gentlemen Luxury Fade')->first();
        $this->assertNotNull($service);
        $this->assertNotNull($service->image_url);
        $this->assertStringStartsWith('/storage/services/', $service->image_url);
    }

    public function test_store_service_validation(): void
    {
        $response = $this->actingAs($this->user)->post('/admin/services', [
            'title' => '',
            'price' => '',
        ]);

        $response->assertSessionHasErrors(['title', 'price']);
    }

    public function test_authenticated_user_can_view_edit_page(): void
    {
        $service = Service::create([
            'title' => 'Old Service',
            'description' => 'Old Desc',
            'price' => 40000,
        ]);

        $response = $this->actingAs($this->user)->get("/admin/services/{$service->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Old Service');
        $response->assertSee('40000');
    }

    public function test_authenticated_user_can_update_service(): void
    {
        $service = Service::create([
            'title' => 'Old Service',
            'description' => 'Old Desc',
            'price' => 40000,
        ]);

        $response = $this->actingAs($this->user)->put("/admin/services/{$service->id}", [
            'title' => 'Updated Service',
            'description' => 'Updated Desc',
            'price' => 60000,
            'image_url' => 'https://example.com/new.jpg',
        ]);

        $response->assertRedirect(route('admin.services.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'title' => 'Updated Service',
            'price' => 60000,
        ]);
    }

    public function test_authenticated_user_can_delete_service(): void
    {
        $service = Service::create([
            'title' => 'Service to Delete',
            'description' => 'Delete me',
            'price' => 30000,
        ]);

        $response = $this->actingAs($this->user)->delete("/admin/services/{$service->id}");

        $response->assertRedirect(route('admin.services.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('services', [
            'id' => $service->id,
        ]);
    }
}

