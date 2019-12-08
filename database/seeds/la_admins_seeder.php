<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class la_admins_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('la_admins')->insert([
            'username' => "fachrz",
            'password' =>  Hash::make('fachru1609'),
            'fullname' => "Fachrurozi",
            'alamat' => 'aosidjfo',
            'no_telp' => '0895610355705'
        ]);
    }
}
