<?php

namespace App\Http\Controllers;

use App\Transaction;

class CoinpaymentController extends Controller {
    private $settings;
    private $client; 
    protected $cp;

    public function __construct() {
        $this->settings = PaymentMethod::where('vendor','coinpayments')->first();

        $this->cp = new \CoinPaymentsAPI();
        $this->cp->setup($this->settings->apikey, $this->settings->privatekey);
        $this->client = $this->client = new Client([
            'base_uri' => $this->settings->base_url,
            'timeout' => 180
        ]);
    }

    /**
     * Retrieve some settings from admin
     */
    public function getSettings() {
    }

    /**
    * Notification endpoint, after a deposit
    * @param \Illuminate\Http\Request $request 
    * @return void 
    */
    public function paymentNotify(Request $request) {
        // Handle deposit here .. 
        $deposit = Transaction::where('tx_id', $request->input('txn_id'))->first();

        if ( 'simple' != $request->input('ipn_type') || 'USD' != $request->input('currency1') ) {
            die();
        }

        if ($deposit) {
            if ( PAYMENT_COMPLETED_TEXT == $deposit->status ) {
                die();
            } else {
                if ($request->input('status') >= 100) {
                    //Check if the request status is greater than 100 then we give value to the user 
                    //Some conversions should be done before giving value to users 
                    $amount = round($request->input('amount'), 8, PHP_ROUND_HALF_DOWN);
                    $fees = round($request->input('fee'), 8, PHP_ROUND_HALF_DOWN);

                    $deposit->status = PAYMENT_COMPLETED_TEXT;
                    $deposit->amount += $fees;
                    $deposit->save();

                // Sending mail to the user 
                    // $user = User::where('id', $deposit->user_id)->first();
                    // $user->notify(new TransactionsNotify($deposit));
                } elseif ($request->input('status') < 0) {
                    $deposit->status = PAYMENT_FAILED_TEXT;
                    $deposit->save();
                } else {
                    $deposit->status = PAYMENT_PENDING_TEXT;
                    $deposit->save();
                }
            }
        } else {
            $amount = round($request->input('net'), 8, PHP_ROUND_HALF_DOWN);
            $ref = $this->generateRef();

            $fees = round($request->input('fee'), 8, PHP_ROUND_HALF_DOWN);

            $deposit = new Transaction([
                'amount' => $amount,
                'tx_id' => $request->input('txn_id'),
                'tx_hash' => $ref,
                'user_id' => '', // @TODO update with user information
                'vendor' => 'coinpayment',
                'method' => 'crypto',
                'address' => $request->input('address'),
                'ticker_symbol' => $request->input('currency2'),
                'type' => 'deposit',
                'status' => PAYMENT_PENDING_TEXT,
            ]);

            if ($request->input('status') >= 100) {
                //Check if the request status is greater than 100 then we give value to the user 
                //Some conversions should be done before giving value to users 
                $deposit->status = PAYMENT_COMPLETED_TEXT;
                $deposit->save();

            // Notify the user through mail about the transaction
                // $user = User::where('id', $deposit->user_id)->first();
                // $user->notify(new TransactionsNotify($deposit));
            } elseif ($request->input('status') < 0) {
                $deposit->status = PAYMENT_FAILED_TEXT;
                $deposit->save();
            } else {
                $deposit->status = PAYMENT_PENDING_TEXT;
                $deposit->save();
            }
        }
    }
}
