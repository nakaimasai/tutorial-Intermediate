<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
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
                'title' => 'イタリアン広島',
                'path' => 'itary.jpeg'
            ],
            [
                'title' => 'フレンチ山口',
                'path' => 'hura.jpeg'
            ],
            [
                'title' => 'レストラン岡山',
                'path' => 'steak.jpeg'
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
            DB::table('folders')->insert($param);
            $param['created_at'] = Carbon::now();
            $param['updated_at'] = Carbon::now();
        }
    }
}
