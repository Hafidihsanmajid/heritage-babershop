<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user
        User::create([
            'name' => 'Admin Heritage',
            'email' => 'admin@heritagebarbershop.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('HERITAGE');
        $response->assertSee('Barbershop');
        $response->assertSee('Grooming Lounge');
        $response->assertSee('Alamat Email');
        $response->assertSee('Kata Sandi');
    }

    public function test_unauthenticated_user_cannot_access_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_user_can_authenticate_with_valid_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@heritagebarbershop.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_user_can_authenticate_with_username_or_name(): void
    {
        $response = $this->post('/login', [
            'email' => 'Admin Heritage',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_user_cannot_authenticate_with_invalid_password(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@heritagebarbershop.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::where('email', 'admin@heritagebarbershop.com')->first();

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Dashboard Utama');
        $response->assertSee('Admin Heritage');
        $response->assertSee('Kapster Siaga');
        $response->assertSee('Heritage Signature Cut');
    }

    public function test_authenticated_user_visiting_login_redirected_to_dashboard(): void
    {
        $user = User::where('email', 'admin@heritagebarbershop.com')->first();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_user_can_logout(): void
    {
        $user = User::where('email', 'admin@heritagebarbershop.com')->first();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }
}

