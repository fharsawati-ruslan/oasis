<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentCategory;

class DocumentCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            'Surat Perjanjian',
            'Surat Kuasa',
            'Invoice',
            'Purchase Order',
            'MOU',
            'Berita Acara',
            'Kontrak Kerja',
            'Legalitas',
            'Laporan Monitoring',
            'Laporan Produksi',
            'Laporan Keuangan',
            'SOP & Kebijakan',
            'Dokumen Proyek',
            'Dokumen HRD',
            'Lainnya',

        ];

        foreach ($categories as $category) {

            DocumentCategory::firstOrCreate([
                'name' => $category,
            ]);

        }
    }
}