<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dogBreeds = [
            'LABRADOR RETRIEVER',
            'GERMAN SHEPHERD',
            'GOLDEN RETRIEVER',
            'BULLDOG',
            'BEAGLE',
            'POODLE',
            'ROTTWEILER',
            'YORKSHIRE TERRIER',
            'BOXER',
            'DACHSHUND'
        ];

        foreach ($dogBreeds as $breed) {
            DB::table('communities')->insert([
                'name' => $breed,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
