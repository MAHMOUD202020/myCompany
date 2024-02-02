<?php

namespace Database\Seeders;

use App\Models\Admin;
use Database\Factories\AdminFactory;
use Database\Factories\UserFactory;
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
//         \App\Models\User::factory(10)->create();
         \App\Models\Admin::factory(10)->create();

//        $this->call(PermissionsSeeder::class);
//        $this->call(BlockSedder::class);
//        Admin::factory(5)->create();
    }
}
