<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call('PrefecturesSeeder');
        $this->call('ItemsSeeder');
        $this->call('UsersTableSeeder');
        $this->call('CamppostsTableSeeder');
        $this->call('Camppost_itemsTableSeeder');
        $this->call('Camppost_borrowsTableSeeder');
    }
}
