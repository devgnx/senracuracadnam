<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();
        App\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@teste.com.br',
            'password' => Hash::make('teste')
        ]);
    }
}
