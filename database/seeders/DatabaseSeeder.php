<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Users
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Heritage',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@heritagebarbershop.com'],
            [
                'name' => 'Admin Heritage',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Sample Services
        $services = [
            [
                'title' => 'Heritage Signature Cut',
                'description' => 'Potongan rambut presisi oleh master barber, pijat relaksasi kepala, keramas dengan sampo herbal, dan styling dengan pomade premium.',
                'price' => 65000,
                'image_url' => 'https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=400&q=80',
            ],
            [
                'title' => 'Beard Trim & Hot Towel',
                'description' => 'Pembentukan jenggot rapi menggunakan razor tradisional dengan balutan handuk hangat dan beard oil bernutrisi.',
                'price' => 45000,
                'image_url' => 'https://images.unsplash.com/photo-1621605815971-fbc98d665033?w=400&q=80',
            ],
            [
                'title' => 'Royal Grooming Full Package',
                'description' => 'Paket lengkap: Signature Cut, Royal Shaving, Hair Spa & Scrub, Hot Towel, dan Styling.',
                'price' => 110000,
                'image_url' => 'https://images.unsplash.com/photo-1585747860715-2ba37e788b70?w=400&q=80',
            ],
            [
                'title' => 'Hair Color & Highlight',
                'description' => 'Pewarnaan rambut profesional menggunakan cat berkualitas tinggi untuk kesan modern dan elegan.',
                'price' => 150000,
                'image_url' => 'https://images.unsplash.com/photo-1599351431202-1e0f0137899a?w=400&q=80',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service);
        }

        // Sample Barbers
        $barbers = [
            [
                'name' => 'Mas Arya Pratama',
                'role' => 'Master Barber & Fade Specialist',
                'instagram_handle' => 'arya_fade',
                'image_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&q=80',
            ],
            [
                'name' => 'Mas Radit Saputra',
                'role' => 'Senior Stylist & Beard Artist',
                'instagram_handle' => 'radit_heritage',
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80',
            ],
            [
                'name' => 'Mas Dimas Kurnia',
                'role' => 'Gentlemen Groomer & Colorist',
                'instagram_handle' => 'dimas_cuts',
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&q=80',
            ],
            [
                'name' => 'Mas Bima Perkasa',
                'role' => 'Classic Barber & Shaving Specialist',
                'instagram_handle' => 'bima_barber',
                'image_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80',
            ],
        ];

        foreach ($barbers as $barber) {
            Barber::updateOrCreate(['name' => $barber['name']], $barber);
        }
    }
}
