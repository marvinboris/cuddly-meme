<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('settings')->delete();
        DB::table('settings')->insert([
            'account_price' => 1,
        ]);
    }
}
