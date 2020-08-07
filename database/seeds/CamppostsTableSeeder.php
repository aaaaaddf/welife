<?php

use Illuminate\Database\Seeder;

class CamppostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campposts')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'start_date'=>'2020-08-06',
                'end_date'=>'2020-08-09',
                'specilal'=>'nothing particular',
                'prefecture_id'=>2,
                
                ],
                [
                'id'=>2,
                'user_id'=>2,
                'start_date'=>'2020-08-06',
                'end_date'=>'2020-08-09',
                'specilal'=>'nothing particular',
                'prefecture_id'=>3,
                
                ],
            ]);
    }
}
