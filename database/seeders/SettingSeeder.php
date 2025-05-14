<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('define.setting.contact');
        foreach ($data as $key => $value) {
            $setting = DB::table('settings')->where('key', $key)->first();
            if (!$setting) {
                DB::table('settings')->where('key', $key)->create([
                    'value' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
