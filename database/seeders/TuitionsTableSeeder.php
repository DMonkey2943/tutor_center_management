<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TuitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'tuition_range'=> 'Từ 50.000đ-100.000đ/buổi',
            ),
            array(
                'tuition_range'=> 'Từ 100.000đ-150.000đ/buổi',
            ),
            array(
                'tuition_range'=> 'Từ 150.000đ-200.000đ/buổi',
            ),
            array(
                'tuition_range'=> 'Từ 200.000đ-250.000đ/buổi',
            ),
            array(
                'tuition_range'=> 'Từ 250.000đ-300.000đ/buổi',
            ),
            array(
                'tuition_range'=> 'Thỏa thuận',
            ),
        );

        DB::table('tuitions')->insert($data);
    }
}
