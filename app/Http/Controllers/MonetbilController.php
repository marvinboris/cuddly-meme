<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use GuzzleHttp\Client;
use App\Transaction;

class MonetbilController extends Controller {
    private $settings;
    private $client; 

    public function __construct() {
        $this->settings = PaymentMethod::where('vendor','monetbil')->first();

        $this->client = $this->client = new Client([
            'base_uri' => $this->settings->base_url,
            'timeout' => 180
        ]);
    }

    /**
     * Generate data necessary for the widget
     * @return JSON object 
     */
    public function generateWidgetData(Request $request) {
        $widgetParams = [
            'version' => 'v2.1',
            'service_key' => $this->settings->publickey,
        ];  

        $payload = [
            'status' => 'success',
            'link' => null
        ];

        $ref = $this->generateRef();
        $user = $request->user();

        $json = [
            'amount' => 600,
            'item_ref' => $ref,
            'payment_ref' => $ref,
            'logo' => '',
            'notify_url' => $this->settings->notify_url,
            'email' => ''
        ];

        $response = $this->client->post('https://api.monetbil.com/widget/v2.1/'.$this->settings->apikey,[
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => $json
        ]);
            
        $response = json_decode($response->getBody()->getContents());
         

        if ( PAYMENT_SUCCESS_STATUS == $response->success ) {
            // Use will be redirected to this link in order to complete the payment

            $deposit = new Transaction([
                'amount' => $json['amount'],
                'tx_id' => $ref,
                'user_id' => $user->id,
                'vendor' => 'monetbil',
                'method' => 'momo', 
                'type' => 'subscription',
                'status' => PAYMENT_PENDING_TEXT,
                'currency' => 'CFA', 
                'address' => $request->input('cel_phone_num')
            ]);
    
            $deposit->save();

            $paymentLink = $response->payment_url;
            $payload['link'] = $paymentLink;
        } else {
            $payload['status'] = 'failure';
            $payload['link'] = 'Something went wrong, please try again later';
        }

        return $payload;
    }

    /**
     * Get notified about the transaction 
     * @param 
     * @return boolean 
     */
    public function notify(Request $request) {
        $tx = Transaction::where('tx_id',$request->input('payment_ref'))->first();

        if ( !$tx ) {
            error_log('Payment not found ');
            exit(false);
        }

        $tx->currency = $request->input('currency');
        $tx->tx_hash = $request->input('transaction_id');
        $tx->vendor = $this->settings->vendor;

        $tx->method = $request->input('operator');
        $tx->address = $request->input('phone');
        $tx->amount = $request->input('amount');

        if ( PAYMENT_SUCCESS_TEXT == $request->input('status') ) {
            $tx->status = PAYMENT_SUCCESS_TEXT;
        } else {
            $tx->status = $request->input('status');
        }

        $tx->save();

        //Eventually notify the user through email
    }
}
