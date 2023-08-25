<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Aiu', 'gender' => 'P', 'nis' => '001001', 'class_id' => 2],
        //     ['name' => 'Budi', 'gender' => 'L', 'nis' => '001002', 'class_id' => 2],
        //     ['name' => 'Siti', 'gender' => 'P', 'nis' => '001003', 'class_id' => 1],
        //     ['name' => 'Tono', 'gender' => 'L', 'nis' => '001004', 'class_id' => 3]
        // ];

        // foreach ($data as $value) {
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        Student::factory()->count(20)->create();
    }
}
