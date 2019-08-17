<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSuperAdminSeeded = false;

        // Clear the table
        // User::truncate();

        // Seed super admin with Role
        $superAdminRole = Role::whereSlug('super.admin')->first();
        $seededSuperAdminEmail = config('soundboard.baseSuperAdminUser01Email');
        $user = User::where('email', '=', $seededSuperAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'              => config('soundboard.baseSuperAdminUser01Name'),
                'email'             => $seededSuperAdminEmail,
                'email_verified_at' => now(),
                'password'          => Hash::make(config('soundboard.baseSuperAdminUser01PW')),
                'remember_token'    => str_random(10),
            ]);

            $user->attachRole($superAdminRole);
            $user->save();

            $newSuperAdminSeeded = true;

        }

        if ($newSuperAdminSeeded) {
            echo "\033[01;33mSuccessfully Seeded: \033[0mSuper Admin User\r\n";
        } else {
            echo "\033[01;33mAlready Seeded: \033[0mSuper Admin User\r\n";
        }

        // Seed admin with Role
        if (config('soundboard.baseAdminUser01Enabled')) {
            $adminRole = Role::whereSlug('admin')->first();
            $seededAdminEmail = config('soundboard.baseAdminUser01Email');
            $user = User::where('email', '=', $seededAdminEmail)->first();
            if ($user === null) {
                $user = User::create([
                    'name'              => config('soundboard.baseAdminUser01Name'),
                    'email'             => $seededAdminEmail,
                    'email_verified_at' => now(),
                    'password'          => Hash::make(config('soundboard.baseAdminUser01PW')),
                    'remember_token'    => str_random(10),
                ]);

                $user->attachRole($adminRole);
                $user->save();

                $newAdminSeeded = true;
            }
            if ($newAdminSeeded) {
                echo "\033[01;33mSuccessfully Seeded: \033[0mAdmin User\r\n";
            } else {
                echo "\033[01;33mAlready Seeded: \033[0mAdmin User\r\n";
            }
        }

        // Seed admin with Role
        if (config('soundboard.baseUser01Enabled')) {
            $adminRole = Role::whereSlug('user')->first();
            $seededEmail = config('soundboard.baseUser01Email');
            $user = User::where('email', '=', $seededEmail)->first();
            if ($user === null) {
                $user = User::create([
                    'name'              => config('soundboard.baseUser01Name'),
                    'email'             => $seededEmail,
                    'email_verified_at' => now(),
                    'password'          => Hash::make(config('soundboard.baseUser01PW')),
                    'remember_token'    => str_random(10),
                ]);

                $user->attachRole($adminRole);
                $user->save();

                $newSeeded = true;
            }
            if ($newSeeded) {
                echo "\033[01;33mSuccessfully Seeded: \033[0mUser\r\n";
            } else {
                echo "\033[01;33mAlready Seeded: \033[0mUser\r\n";
            }
        }

    }
}
