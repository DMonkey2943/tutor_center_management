<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'grade_name'=>'Mầm non',
            ),
            array(
                'grade_name'=>'Lớp 1',
            ),
            array(
                'grade_name'=>'Lớp 2',
            ),
            array(
                'grade_name'=>'Lớp 3',
            ),
            array(
                'grade_name'=>'Lớp 4',
            ),
            array(
                'grade_name'=>'Lớp 5',
            ),
            array(
                'grade_name'=>'Lớp 6',
            ),
            array(
                'grade_name'=>'Lớp 7',
            ),
            array(
                'grade_name'=>'Lớp 8',
            ),
            array(
                'grade_name'=>'Lớp 9',
            ),
            array(
                'grade_name'=>'Lớp 10',
            ),
            array(
                'grade_name'=>'Lớp 11',
            ),
            array(
                'grade_name'=>'Lớp 12',
            ),
            array(
                'grade_name'=>'Ôn thi vào 10 ',
            ),
            array(
                'grade_name'=>'Ôn thi vào 10 (Chuyên)',
            ),
            array(
                'grade_name'=>'Ôn thi Đại học',
            ),
            array(
                'grade_name'=>'Lớp khác',
            ),
        );

        DB::table('grades')->insert($data);
    }
}
