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
         * Get Permissions.
         */
        $superAdminPermissions  = config('roles.models.permission')::all();
        $adminPermissions       = config('roles.models.permission')::where('slug', '!=' , 'perms.super.admin')->get();
        $userPermissions        = config('roles.models.permission')::where('slug', '=' , 'perms.user')->get();

        /**
         * Get Roles.
         */
        $roleUserpAdmin = config('roles.models.role')::where('name', '=', 'Super Admin')->first();
        $roleAdmin      = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $roleUser       = config('roles.models.role')::where('name', '=', 'User')->first();

        /**
         * Attach Permissions to Roles.
         */
        foreach ($superAdminPermissions as $superAdminPermission) {
            $roleUserpAdmin->attachPermission($superAdminPermission);
        }
        foreach ($adminPermissions as $adminPermission) {
            $roleAdmin->attachPermission($adminPermission);
        }
        foreach ($userPermissions as $userPermission) {
            $roleUser->attachPermission($userPermission);
        }
    }
}
