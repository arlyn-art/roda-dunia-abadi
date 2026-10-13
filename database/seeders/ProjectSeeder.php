<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Proyek PLTU Suralaya Unit 8',
                'location' => 'Suralaya - Banten',
                'years' => 2007,
                'working' => '<ul><li>Cutting and Dispose Soil & Rock</li><li>Reklamasi (stage 1)</li><li>Reklamasi (stage 2)</li></ul>',
                'partner' => 'PT Rekayasa Industri',
                'description' => '<p>Proyek strategis nasional untuk mendukung ketersediaan pasokan listrik wilayah Jawa-Bali dengan standar geoteknik tinggi.</p>',
            ],
            [
                'title' => 'Pembangunan Infrastruktur Pabrik Cikarang',
                'location' => 'Cikarang - Bekasi',
                'years' => 2024,
                'working' => '<ul><li>Land Clearing & Grading</li><li>Pondasi Bored Pile</li><li>Drainase Utama Kawasan</li></ul>',
                'partner' => 'PT Astra Honda Motor',
                'description' => '<p>Persiapan lahan industri berat beserta sistem mitigasi air dan struktur penahan tanah yang dikerjakan dengan pengawasan ketat.</p>',
            ],
            [
                'title' => 'Pematangan Lahan Smelter Nikel',
                'location' => 'Morowali - Sulawesi Tengah',
                'years' => 2023,
                'working' => '<ul><li>Massive Cut & Fill</li><li>Slope Protection</li><li>Access Road Construction</li></ul>',
                'partner' => 'PT IMIP',
                'description' => '<p>Pekerjaan pembentukan kontur tanah berbukit menjadi area datar siap bangun pabrik pengolahan mineral.</p>',
            ],
            [
                'title' => 'Konstruksi Bendungan Pengendali Banjir',
                'location' => 'Semarang - Jawa Tengah',
                'years' => 2022,
                'working' => '<ul><li>Galian Alur Sungai</li><li>Pemasangan Sheet Pile</li><li>Pengecoran Spillway</li></ul>',
                'partner' => 'Kementerian PUPR',
                'description' => '<p>Infrastruktur pengendali debit air guna mengantisipasi banjir rob dan kiriman air hulu.</p>',
            ],
            [
                'title' => 'Pengembangan Area Pelabuhan Peti Kemas',
                'location' => 'Tanjung Priok - Jakarta Utara',
                'years' => 2021,
                'working' => '<ul><li>Pengerukan Alur Pelayaran</li><li>Pancang Tiang Dermaga</li><li>Urugan Pasir Laut</li></ul>',
                'partner' => 'PT Pelindo',
                'description' => '<p>Perluasan kapasitas sandar kapal kargo internasional untuk efisiensi rantai pasok nasional.</p>',
            ],
            [
                'title' => 'Pembangunan Jalan Tol Akses Patimban',
                'location' => 'Subang - Jawa Barat',
                'years' => 2020,
                'working' => '<ul><li>Stripping Top Soil</li><li>Timbunan Pilihan</li><li>Soil Stabilization</li></ul>',
                'partner' => 'PT Jasa Marga',
                'description' => '<p>Konektivitas tol langsung menuju kawasan pelabuhan internasional baru diPantura Jawa.</p>',
            ],
            [
                'title' => 'Revitalisasi Jalur Kereta Api Lintas Selatan',
                'location' => 'Purwokerto - Jawa Tengah',
                'years' => 2019,
                'working' => '<ul><li>Perkuatan Tebing Rel</li><li>Pemasangan Gorong-gorong</li><li>Ballast Cleaning Prep</li></ul>',
                'partner' => 'PT KAI (Persero)',
                'description' => '<p>Peningkatan keamanan jalur kereta api dari potensi longsor dan genangan air musim hujan.</p>',
            ],
            [
                'title' => 'Pematangan Lahan Kilang Minyak Tuban',
                'location' => 'Tuban - Jawa Timur',
                'years' => 2018,
                'working' => '<ul><li>Impor Tanah Urugan</li><li>Soil Compaction Test</li><li>Pagar Keliling Tapak</li></ul>',
                'partner' => 'Pertamina Rosneft',
                'description' => '<p>Penyediaan lahan datar seluas ratusan hektar untuk kompleks kilang petrokimia modern.</p>',
            ],
            [
                'title' => 'Infrastruktur Pendukung Bandara Internasional',
                'location' => 'Kulon Progo - Yogyakarta',
                'years' => 2017,
                'working' => '<ul><li>Precision Grading</li><li>Subgrade Compaction</li><li>Side Drainage System</li></ul>',
                'partner' => 'PT Angkasa Pura',
                'description' => '<p>Pekerjaan geoteknik presisi tinggi untuk area landas pacu pesawat berbadan lebar.</p>',
            ],
            [
                'title' => 'Pembangunan Pabrik Semen Hijau',
                'location' => 'Rembang - Jawa Tengah',
                'years' => 2015,
                'working' => '<ul><li>Quarry Development</li><li>Haul Road Construction</li><li>Plant Site Preparation</li></ul>',
                'partner' => 'PT Semen Indonesia',
                'description' => '<p>Penyediaan infrastruktur tapak industri semen ramah lingkungan berteknologi tinggi.</p>',
            ],
            [
                'title' => 'Pematangan Lahan Kawasan Pariwisata Mandalika',
                'location' => 'Lombok - NTB',
                'years' => 2014,
                'working' => '<ul><li>Landscaping & Shaping</li><li>Erosion Control</li><li>Drainase Kawasan Wisata</li></ul>',
                'partner' => 'ITDC',
                'description' => '<p>Pengembangan infrastruktur dasar kawasan ekonomi khusus pariwisata prioritas.</p>',
            ],
            [
                'title' => 'Konstruksi Pipa Gas Bawah Tanah',
                'location' => 'Gresik - Jawa Timur',
                'years' => 2012,
                'working' => '<ul><li>Trench Excavation</li><li>Bedding & Padding</li><li>Backfilling & Restoration</li></ul>',
                'partner' => 'PGN (Perusahaan Gas Negara)',
                'description' => '<p>Pemasangan jaringan distribusi energi gas untuk kawasan industri terpadu.</p>',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}