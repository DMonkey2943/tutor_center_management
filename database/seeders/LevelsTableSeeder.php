<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'level_name'=> 'Thạc sĩ',
            ),
            array(
                'level_name'=>'Cao học',
            ),
            array(
                'level_name'=>'Đại học',
            ),
            array(
                'level_name'=> 'Cao đẳng',
            ),
            array(
                'level_name'=>'Sinh viên Đại học',
            ),
            array(
                'level_name'=> 'Sinh viên Cao đẳng',
            ),
            array(
                'level_name'=> 'Trung cấp',
            ),
        );

        DB::table('levels')->insert($data);
    }
}
