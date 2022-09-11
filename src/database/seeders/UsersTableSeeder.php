<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'id' => '10',
                'name' => 'イタリアン広島',
                'password' => 'pass'
            ],
            [
                'id' => '11',
                'name' => 'フレンチ山口',
                'password' => 'pass'
            ],
            [
                'id' => '12',
                'name' => 'レストラン岡山',
                'password' => 'pass'
            ],
            [
                'id' => '100',
                'name' => 'admin',
                'password' => 'pass'
            ]
        ];

        //$paths = ['itary.jpeg', 'hura.jpeg', 'steak.jpeg'];

        foreach ($params as $param) {
            //DB::table('folders')->insert([
            //    'title' => $title,
            //    'path' => $path,
            //    'created_at' => Carbon::now(),
            //    'updated_at' => Carbon::now(),
            //]);
            DB::table('users')->insert($param);
            $param['created_at'] = Carbon::now();
            $param['updated_at'] = Carbon::now();
        }
    }
}
