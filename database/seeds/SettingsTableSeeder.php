<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name'      => 'Theme Id',
                'key'       => 'theme_id',
                'value'     => 1,
                'active'    => 1,
            ],
        ];

        foreach ($settings as $setting) {
            $newSetting = Setting::where('name', '=', $setting['name'])
                                            ->orWhere('key', '=', $setting['key'])
                                            ->first();

            if ($newSetting === null) {
                $newSetting = Setting::create([
                    'name'      => $setting['name'],
                    'key'       => $setting['key'],
                    'value'     => $setting['value'],
                    'active'    => $setting['active'],
                ]);
            }
        }
    }
}
