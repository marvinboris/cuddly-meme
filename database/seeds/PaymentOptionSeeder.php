<?php

use Illuminate\Database\Seeder;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_options')->delete();

        $id = DB::table('files')->insertGetId([
            'filename' => 'mtn_logo.jpg',
            'mime' => 'image/jpeg'
        ]);

        DB::table('payment_options')->insert([
            'name' => 'MTN Mobile Money',
            'slug' => 'mtn_mobile_money',
            'description' => 'Une solution de mobile banking avec le reseau MTN',
            'logo_file_id' => $id
        ]);
    }
}
