<?php

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin      = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $roleUserpAdmin = config('roles.models.role')::where('name', '=', 'Super Admin')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
            $roleUserpAdmin->attachPermission($permission);
        }
    }
}
