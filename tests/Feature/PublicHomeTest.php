<?php

namespace Tests\Feature;

use App\Models\Barber;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicHomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_successfully_with_sections(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('HERITAGE BARBERSHOP');
        $response->assertSee('Booking Sekarang');
        $response->assertSee('Lebih dari Sekadar Potong Rambut');
        $response->assertSee('Menu Layanan');
        $response->assertSee('Temui Master Barbers Kami');
        $response->assertSee('Jl. Senopati Raya No. 45');
    }

    public function test_landing_page_displays_services_and_barbers(): void
    {
        Service::create([
            'title' => 'Signature Fade Cut',
            'description' => 'Precision cut and wash',
            'price' => 75000,
            'image_url' => 'https://example.com/fade.jpg',
        ]);

        Barber::create([
            'name' => 'Bima The Barber',
            'role' => 'Master Stylist',
            'instagram_handle' => 'bima_fade',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Signature Fade Cut');
        $response->assertSee('Rp 75.000');
        $response->assertSee('Bima The Barber');
        $response->assertSee('Master Stylist');
        $response->assertSee('@bima_fade');
    }

    public function test_authenticated_user_sees_admin_panel_button(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@heritage.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee('Panel Admin');
    }
}
