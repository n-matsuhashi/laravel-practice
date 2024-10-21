<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
//        DB::table('offices')->insert([
//            [
//            'name' => '東京テストビル',
//            'address' => '東京都千代田区1-1-1',
//            'post_code' => '1000001',
//            'stair' => 10,
//            'comment' => 'テストビルです',
//            ],
//            [
//                'name' => '大阪テストビル',
//                'address' => '大阪府大阪市1-1-1',
//                'post_code' => '5300001',
//                'stair' => 5,
//                'comment' => 'テストビルです',
//            ]
//        ]);

        \App\Models\Office::factory()->count(10)->create();
    }
}
