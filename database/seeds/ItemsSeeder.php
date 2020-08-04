<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items=[
            ['id'=>1,'name'=>'テント'],
            ['id'=>2,'name'=>'椅子'],
            ['id'=>3,'name'=>'バーベキューセット'],
            ['id'=>4,'name'=>'ライト'],
            ['id'=>5,'name'=>'タープ'],
            ['id'=>6,'name'=>'グランドシート'],
           ['id'=>7,'name'=>'寝袋'],
            ['id'=>8,'name'=>'枕'],
            ['id'=>9,'name'=>'テーブル'],
             ['id'=>10,'name'=>'カセットコンロ'],
             ['id'=>11,'name'=>'クーラーボックス'],
            ];
            DB::table('items')->insert($items);
    }
}
