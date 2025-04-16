<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $komentar = new Komentar();
        $komentar->komentar = "ovo je prvi komentar na prvoj objavi";
        $komentar->blog_id = 1;
        $komentar->save();

        Komentar::create([
            "komentar" => "ovo je drugi komentar na prvoj objavi",
            "blog_id" => 1,
        ]);

        Komentar::create([
            "komentar" => "ovo je prvi komentar na drugoj objavi",
            "blog_id" => 2,
        ]);
        Komentar::create([
            "komentar" => "Super objava! Svaka cast",
            "blog_id" => 2,
        ]);
    }
}
