<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Classroom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => '1A'],
            ['name' => '1B'],
            ['name' => '1C'],
            ['name' => '1D']
        ];

        foreach ($data as $value) {
            Classroom::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
