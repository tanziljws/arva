<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        $categories = ['Kegiatan', 'Prestasi', 'Ekstrakurikuler', 'Upacara', 'Lomba'];

        return [
            'title' => $this->faker->sentence(3), // contoh: "Lomba Sains Nasional"
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->paragraph(),
            // gunakan URL random dari picsum.photos
            'image' => 'https://picsum.photos/600/400?random=' . $this->faker->unique()->numberBetween(1, 9999),
        ];
    }
}
