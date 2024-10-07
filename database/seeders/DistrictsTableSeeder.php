<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'district_name'=> 'Quận Bình Thủy',
            ),
            array(
                'district_name'=>'Quận Cái Răng',
            ),
            array(
                'district_name'=>'Huyện Cờ Đỏ',
            ),
            array(
                'district_name'=> 'Quận Ninh Kiều',
            ),
            array(
                'district_name'=>'Quận Ô Môn',
            ),
            array(
                'district_name'=>'Huyện Phong Điền',
            ),
            array(
                'district_name'=> 'Huyện Thới Lai',
            ),
            array(
                'district_name'=>'Quận Thốt Nốt',
            ),
            array(
                'district_name'=>'Huyện Vĩnh Thạnh',
            ),
        );

        DB::table('districts')->insert($data);
    }
}
