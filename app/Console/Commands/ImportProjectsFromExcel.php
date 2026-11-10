<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportProjectsFromExcel extends Command
{
    protected $signature = 'projects:import-excel';
    protected $description = 'Mengosongkan tabel projects dan mengimpor data terbaru dari file Excel';

    public function handle()
    {
        $filePath = storage_path('app/data_proyek_rda.xlsx');

        if (!file_exists($filePath)) {
            $this->error("File Excel tidak ditemukan di: {$filePath}");
            return;
        }

        $this->info('1. Menghapus data lama di tabel projects...');

        // Nonaktifkan foreign key check & kosongkan tabel
        Schema::disableForeignKeyConstraints();
        DB::table('projects')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->info('2. Membaca data dari file Excel...');

        // Load Excel file menggunakan PhpSpreadsheet
        $ioFactory = 'PhpOffice\\PhpSpreadsheet\\IOFactory';
        if (!class_exists($ioFactory)) {
            $this->error('PhpSpreadsheet tidak tersedia. Jalankan composer require phpoffice/phpspreadsheet.');
            return 1;
        }

        $spreadsheet = call_user_func([$ioFactory, 'load'], $filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        $insertedCount = 0;

        // Mulai dari baris ke-2 (karena baris 1 adalah header)
        foreach ($rows as $index => $row) {
            if ($index == 1) continue; // Lewati header

            // Pastikan kolom ID tidak kosong
            if (empty($row['A'])) continue; 

            DB::table('projects')->insert([
                'id'          => $row['A'], // ID
                'title'       => $row['B'], // Title
                'slug'        => $row['C'], // Slug
                'location'    => $row['D'], // Location
                'years'       => !empty($row['E']) ? (int)$row['E'] : null,       // Start Year / Years
                'end_year'    => !empty($row['F']) ? (int)$row['F'] : null,       // End Year
                'working'     => $row['G'], // Working (HTML Scope)
                'partner'     => $row['H'], // Partner
                'description' => !empty($row['I']) ? $row['I'] : '<p></p>',       // Description
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            $insertedCount++;
        }

        $this->info("Sukses! {$insertedCount} data proyek berhasil diimpor dari Excel ke database! 🎉");
    }
}