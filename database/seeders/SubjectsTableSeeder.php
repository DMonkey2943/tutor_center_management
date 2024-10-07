<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'subject_name'=>'Khảo bài',
            ),
            array(
                'subject_name'=> 'Toán',
            ),
            array(
                'subject_name'=>'Lý',
            ),
            array(
                'subject_name'=>'Hóa',
            ),
            array(
                'subject_name'=>'Văn',
            ),
            array(
                'subject_name'=>'Tiếng Việt',
            ),
            array(
                'subject_name'=>'Tiếng Anh',
            ),
            array(
                'subject_name'=>'Sinh',
            ),
            array(
                'subject_name'=>'Sử',
            ),
            array(
                'subject_name'=>'Địa',
            ),
            array(
                'subject_name'=>'Tin Học',
            ),
            array(
                'subject_name'=>'GDCD',
            ),
            array(
                'subject_name'=>'Khoa học tự nhiên',
            ),
            array(
                'subject_name'=>'Khoa học xã hội',
            ),
            array(
                'subject_name'=>'Rèn chữ',
            ),
            array(
                'subject_name'=>'Tiếng Anh giao tiếp',
            ),
            array(
                'subject_name'=>'Tiếng Pháp',
            ),
            array(
                'subject_name'=>'Tiếng Hàn',
            ),
            array(
                'subject_name'=>'Tiếng Hoa',
            ),
            array(
                'subject_name'=>'Tiếng Nhật',
            ),
        );

        DB::table('subjects')->insert($data);
    }
}
