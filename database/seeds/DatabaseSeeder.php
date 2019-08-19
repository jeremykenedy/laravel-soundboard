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
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call([SoundsTableSeeder::class]);
        $this->call([ThemesTableSeeder::class]);
        $this->call([SettingsTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
    }
}
