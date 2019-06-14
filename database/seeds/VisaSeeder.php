<?php

use App\PaymentMethod;
use Illuminate\Database\Seeder;

class VisaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $visa = new PaymentMethod([

            'vendor' => 'VISA/MasterCard',
            'apikey' => '2278',
            'privatekey' => '237655728725',
            'base_url' => 'https://www.softeller.com/api_softeller/request_payment',
            'logosrc' => 'img/vendors/visa',
            'cancel_url' => '',
            'return_url' => '',
            'notify_url' => 'https://workoo.net/payment/visa/notify',
        ]);

        $visa->save();
    }
}
