<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用faker方法模拟多条数据,实例化时，create里面的参数表示本地化
        $faker = \Faker\Factory::create('zh_CN');
        $data = [];

        for($i=0;$i<500;$i++){
            $data[] = [
                'username' => $faker -> username,
                'password' => bcrypt('password'),
                'gender' => rand(1,3),
                'mobile' => $faker ->phoneNumber,
                'email' =>$faker -> email,
                'avatar' => '/images/avatar/th.jpg',
                'created_at' => date('Y:m:d H:i:s'),
                'type' => rand(1,2),
                'status' => rand(1,2),
            ];
        }
        //写入数据表
        DB::table('member') -> insert($data);
    }
}
