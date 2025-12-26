<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        // Contact::factory()->count(35)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
