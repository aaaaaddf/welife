<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'test',
                'email'=>'test1120@icloud.com',
                'password'=>'abc1234'
                
                ],
            [
                 'id'=>2,
                 'name'=>'test2',
                 'email'=>'test2@icloud.com',
                 'password'=>'test1234'
                ]
                
            ]);
    }
}
