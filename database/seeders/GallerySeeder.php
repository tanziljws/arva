<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // contoh 5 data dummy
        Gallery::insert([
            [
                'title' => 'Upacara Bendera',
                'category' => 'Kegiatan Sekolah',
                'description' => 'Dokumentasi upacara bendera hari Senin.',
                'image' => 'uploads/upacara.jpg', // nanti pastikan file ada
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lomba 17 Agustus',
                'category' => 'Perlombaan',
                'description' => 'Keseruan lomba tarik tambang.',
                'image' => 'uploads/lomba.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ekstrakurikuler Pramuka',
                'category' => 'Ekstrakurikuler',
                'description' => 'Latihan pramuka setiap Sabtu sore.',
                'image' => 'uploads/pramuka.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kunjungan Industri',
                'category' => 'Study Tour',
                'description' => 'Study tour ke pabrik teknologi.',
                'image' => 'uploads/tour.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pentas Seni',
                'category' => 'Kegiatan Sekolah',
                'description' => 'Penampilan musik dan tari siswa.',
                'image' => 'uploads/pentas.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
