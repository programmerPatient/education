<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建2个数据表的模拟数据
        DB::table('profession') -> insert([
            'pro_name' => 'php基础班',
            'protype_id' => '1',
            'teachers_ids' => '10,11,16,17',
            'created_at' => date('Y-m-d H:i:s'),
            'duration'  => 18,
            'cover_img' => '/static/demo.jpg',
            'price'  => '100.00'
        ]);

        DB::table('profession') -> insert([
            'pro_name' => 'php就业班',
            'protype_id' => '1',
            'teachers_ids' => '22,25,26,27',
            'created_at' => date('Y-m-d H:i:s'),
            'duration'  => 18,
            'cover_img' => '/static/demo.jpg',
            'price'  => '200.00'
        ]);

        DB::table('profession') -> insert([
            'pro_name' => '前端基础班',
            'protype_id' => '2',
            'teachers_ids' => '71,72,73,75',
            'created_at' => date('Y-m-d H:i:s'),
            'duration'  => 18,
            'cover_img' => '/static/demo.jpg',
            'price'  => '100.00'
        ]);

        DB::table('profession') -> insert([
            'pro_name' => '基础班',
            'protype_id' => '1',
            'teachers_ids' => '49,51,53,56',
            'created_at' => date('Y-m-d H:i:s'),
            'duration'  => 18,
            'cover_img' => '/static/demo.jpg',
            'price'  => '100.00'
        ]);

    }
}
