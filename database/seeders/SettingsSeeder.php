<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setValue('login_video', 'assets/video.mp4');
        Setting::setValue('logo_dark', 'assets/logo_dark.png');
        Setting::setValue('logo_light', 'assets/logo_light.png');
        Setting::setValue('sidebar_color', '#343a40');
    }
}
