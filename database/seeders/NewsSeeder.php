<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        for ($i = 1; $i <= 12; $i++) {
            $title = "Berita Industri Konstruksi dan Sitework Bagian ke-" . $i;
            
            News::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'excerpt' => 'Ini adalah ringkasan singkat dari artikel berita nomor ' . $i . ' mengenai perkembangan proyek dan konstruksi.',
                'description' => '<p>Ini adalah isi lengkap dari artikel berita nomor ' . $i . '. <span style="color: red;">Berisi informasi penting</span> seputar dunia teknik sipil dan sitework.</p>',
                'date' => now()->subDays(rand(1, 30)),
                'is_active' => true,
                'user_id' => $user->id,
                'meta_title' => $title,
                'meta_description' => 'Meta deskripsi untuk artikel berita ke-' . $i,
                'meta_tag' => 'konstruksi, sitework, berita',
            ]);
        }
    }
}