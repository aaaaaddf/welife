<?php

use Illuminate\Database\Seeder;

class Camppost_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camppost_items')->insert([
            ['camppost_id'=>1,
            'items_id'=>1],
            [
                'camppost_id'=>2,
                'items_id'=>"3"
                ]
            ]);
    }
}
