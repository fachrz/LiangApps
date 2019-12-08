<?php

use Illuminate\Database\Seeder;

class la_applications_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('la_applications')->insert([
            'app_name' => "Line",
            'app_icon' => 'asdkfj',
            'dev_name' => "Line Corporation",
            'price' => 0, 
        ]);
    }
}
