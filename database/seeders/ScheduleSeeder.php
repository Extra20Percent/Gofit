<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'schedule_for' => '2008-11-11 13:23:44',
            'Nama_kegiatan'=> 'lomba',
            'name'=> 'tes',
            'instructor_id' => 'libur',
           
        ]);

       
    }
}
