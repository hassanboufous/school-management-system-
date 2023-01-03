<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\SettingSeeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //  DB::table('users')->insert([
        //     'name' => 'Hassan Boufous',
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('12345678'),
        // ]);

       $this->call(SettingSeeder::class);

    }
}
