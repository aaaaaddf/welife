<?php

use Illuminate\Database\Seeder;

class Camppost_borrowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camppost_borrows')->insert([
            [
                'start_date'=>'2020-08-19',
                'end_date'=>'2020-08-29',
                'camppost_id'=>2,
                'user_id'=>1
                ],
                 [
                'start_date'=>'2020-08-20',
                'end_date'=>'2020-08-30',
                'camppost_id'=>1,
                'user_id'=>2
                ],
            ]);
    }
}
