<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;

class PaymentMethodSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $monetBil = new PaymentMethod([
            'vendor' => 'monetbil',
            'base_url' => 'https://api.monetbil.com/widget/v2.1',
            'logoSrc' => 'img/vendors/monetbil.png',
            'apikey' => 'p2q8IwzElvoMuJ3egOkk9dRLX96WHk8K',
            'privatekey' => 'KdyYy7cvdJVva8EHgHXfxYeXq9nEWxuhS39f9SJuxJAglBovE9fdkE0MXv7JHn1U',
            'cancel_url' => 'https://workoo.net/payment/monetbil/cancel',
            'return_url' => 'https://workoo.net/',
            'notify_url' => 'https://workoo.net/payment/monetbil/notify',
        ]);

        $monetBil->save();

        $cinetPay = new PaymentMethod([
            'vendor' => 'cinetpay',
            'base_url' => 'https://api.cinetpay.com/v1/',
            'logoSrc' => 'img/vendors/cinetpay.png',
            'apikey' => '5352348315ce3c869ed52b9.20266957',
            'cancel_url' => '',
            'token' => '175739', // Represents the site id for cinetpay
            'return_url' => '',
            'notify_url' => 'https://workoo.net/payment/cinetpay/notify',
        ]);

        $cinetPay->save();

        $btc = new PaymentMethod([
            'vendor' => 'coinpayments',
            'apikey' => 'ea0a51d132ad2b95409ff962b2de3993dc0ecd5b8f0d0c9c114340bf7b2a6f7a',
            'privatekey' => '2aabd883df1F7779194c78149525d72dfEeCd0Ec8C3D5cbb577dAB75e5037cAE',
            'base_url' => 'https://www.coinpayments.net/api.php',
            'logosrc' => 'img/vendors/coinpayments',
            'cancel_url' => '',
            'return_url' => '',
            'notify_url' => 'https://workoo.net/payment/coinpayments/notify',
        ]);

        $btc->save();
    }
}
