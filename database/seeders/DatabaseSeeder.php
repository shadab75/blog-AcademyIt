<?php

namespace Database\Seeders;

use App\Http\Requests\NewRoleRequest;
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
        $this->call([
           PermissionSeeder::class,
              AdminSeeder::class,
            NormalUserSeeder::class
        ]);
    }
}
