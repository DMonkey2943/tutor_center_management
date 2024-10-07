<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'phone' => '0856068959',
                'role'=>'admin',
                'password'=>Hash::make('admin123'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ),
            array(
                'name'=>'Le Truong Ngoc Duyen',
                'email'=>'ltnd@gmail.com',
                'phone' => '0842933224',
                'role'=>'tutor',
                'password'=>Hash::make('12345678'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ),
            array(
                'name'=>'Tran Thi C',
                'email'=>'ttc@gmail.com',
                'phone' => '0982532781',
                'role'=>'parent',
                'password'=>Hash::make('12345678'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ),
        );

        DB::table('users')->insert($data);
    }
}
