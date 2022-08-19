<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = ['カフェ', 'ステーキ屋'];

        foreach ($shops as $shop) {
            DB::table('shoplists')->insert([
                'shop' => $shops,
            ]);
        }
    }
}
