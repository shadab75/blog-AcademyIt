<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([
            /**
             * category permissions
             */
            [
                'title'=> 'create_category'
            ],
            [
                'title'=> 'read_category'
            ],
            [
                'title'=> 'update_category'
            ],
            [
                'title'=> 'delete_category'
            ],

        ]);

        /**
         * posts permissions
         */
        Permission::query()->insert([
            [
                'title'=> 'create_post'
            ],
            [
                'title'=> 'read_post'
            ],
            [
                'title'=> 'update_post'
            ],
            [
                'title'=> 'delete_post'
            ],
        ]);

        /**
         * role permissions
         */
        Permission::query()->insert([
            [
                'title'=> 'create_role'
            ],
            [
                'title'=> 'read_role'
            ],
            [
                'title'=> 'update_role'
            ],
            [
                'title'=> 'delete_role'
            ],
            [
                'title'=> 'create_user'
            ],
            [
                'title'=> 'read_user'
            ],
            [
                'title'=> 'update_user'
            ],
            [
                'title'=> 'delete_user'
            ],
        ]);
    }
}
