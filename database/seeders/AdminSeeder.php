<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin =Role::query()->create([
            'title'=>'admin'
        ]);
        $Admin->permissions()->attach(Permission::all());
        User::query()->insert([
            'role_id'=>$Admin->id,
            'name'=>'Hossein',
            'mobile'=>'09129596150',
            'email'=>'shadabfar75@gmail.com',
            'password'=>bcrypt(12345)
        ]);
    }
}
