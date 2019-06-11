<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use App\PaymentMethod;
use CinetPay\CinetPay;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CinetpayController extends Controller {
    private $settings;
    private $client;
    private $transactionId;

    public function __construct() {
        $this->settings = PaymentMethod::where('vendor','cinetpay')->first();

        $this->client = $this->client = new Client([
            'base_uri' => $this->settings->base_url,
            'timeout' => 180
        ]);
    }

    /**
     *  Get base configuration for the method
     *  @param none
     *  @return array [] mixed 
     */
    public function getConf() {
        $this->transactionId = CinetPay::generateTransId();
        $cinetPayData = [];
        $date = date('Y-m-d H:i:s');
        $date = new \DateTime($date);
        
        $cinetPayData['apikey'] = $this->settings->apikey;
        $cinetPayData['cpm_site_id'] = $this->settings->token;
        $cinetPayData['cpm_currency'] = 'CFA';
        $cinetPayData['cpm_page_action'] = 'PAYMENT';
        $cinetPayData['cpm_payment_config'] = 'SINGLE';
        $cinetPayData['cpm_version'] = 'V1';
        $cinetPayData['cpm_language'] = 'fr';
        $cinetPayData['cpm_trans_date'] = $date->format('YmdHis');
        $cinetPayData['cpm_trans_id'] = $this->transactionId;
        $cinetPayData['cpm_designation'] = 'Deposit in Yuscard';
        $cinetPayData['form_action'] = 'https://secure.cinetpay.com';
        $cinetPayData['notify_url'] = $this->settings->notify_url;
        $cinetPayData['cpm_return_mode'] = 'POST';        
        $cinetPayData['return_url'] = 'https://workoo.net';
        $cinetPayData['cancel_url'] = 'https://workoo.net';

        return $cinetPayData;
    }

    /**
     *  Get the signature from Cinetpay servers
     * @param Illuminate\Http\Request $request 
     * @return JSON object 
     */
    public function getSignature(Request $request) {
        try {
            $query = '?method=getSignatureByPost';
            $response = $this->client->post($query,[
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'apikey' => $this->settings->apikey,
                    'cpm_site_id' => $request->input('cpm_site_id'),
                    'cpm_page_action' => 'PAYMENT',
                    'cpm_payment_config' => 'SINGLE',
                    'cpm_version' => 'V1',
                    'cpm_language' => 'fr',
                    'cpm_trans_date' => $request->input('cpm_trans_date'),
                    'cpm_amount' => $request->input('cpm_amount'),
                    'cpm_trans_id' => $request->input('cpm_trans_id'),
                    'cpm_currency' => $request->input('cpm_currency'),
                    'cpm_designation' => $request->input('cpm_designation'),
                ]
            ]);

            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return response()->json($response,500);
        }
    }

    /**
     * For the deposit, in the frontend we'll create a form with
     * names equals to what cinetpay needs
     * @param none 
     * @return array [] mixed 
     */
    public function deposit(Request $request) {
        $confTab = $this->getConf();
        $apiKey = $confTab['apikey'];
        $site_id = $confTab['cpm_site_id'];
        $id_transaction = CinetPay::generateTransId(); 

        $paymentDescr = sprintf('Workoo services', $id_transaction); 
        $txDate = date('Y-m-d H:i:s'); 

        $amountToPay = 600; // @TODO make the amount comming from settings table
        $userId = $request->user()->id; 

        $notify_url = $confTab['notify_url']; 

        $return_url = $confTab['return_url'];
        $cancel_url = $confTab['cancel_url'];

        $cp = new CinetPay($site_id, $apiKey);
        try {
            $responsePayload['status'] = 'success';
            $responsePayload['message'] = 'Deposit initiated';

            $cp->setTransId($id_transaction)
                      ->setDesignation($paymentDescr)
                      ->setTransDate($txDate)
                      ->setAmount($amountToPay)
                      ->setDebug(false)
                      ->setCustom($userId)
                      ->setNotifyUrl($notify_url)
                      ->setReturnUrl($return_url)
                      ->setCancelUrl($cancel_url);
                      
            return $cp;

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
    * Url called by CinetPay to notify us when a depoist is made
    * NB : In this case the tx_hash is the signature of Cinetpay 
    *  @param amount integer
    *  @param email string 
    *  @return JSON object 
    */
    public function paymentNotify(Request $request) {
        // Redirect here to Cinetpay with post data 
        $user = User::find($request->input('cpm_custom'));

        if( !$user ){
            error_log("User not found");
            die();
        }

        // Check if such tx_hash already exists 

        $deposit = Transaction::where('tx_hash',$request->input('cpm_trans_id'))->first();

        if( !$deposit ){
            
            $deposit = new Transaction([
                'amount' => $request->input('cpm_amount'),
                'tx_id' => $this->generateRef(),
                'tx_hash' => $request->input('cpm_trans_id'),
                'user_id' => $user->id,
                'vendor' => 'cinetpay',
                'method' => 'momo', 
                'type' => 'subscription',
                'status' => PAYMENT_PENDING_TEXT,
                'currency' => 'CFA', 
                'address' => $request->input('cel_phone_num')
            ]);

            $deposit->save();
        }

  

        //Let's now check the payment status 

        $query = '?method=checkPayStatus';

        $response = $this->client->post($query,[
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'apikey' => $this->settings->apikey,
                'cpm_site_id' => $this->settings->token, // site_id in this case 
                'cpm_trans_id' => $deposit->tx_hash
            ]
        ]);

        $response = json_decode($response->getBody()->getContents());
        $response = $response->transaction;
        $logs = var_export($response, true);
        error_log($logs);

        if ( !empty($response->cpm_result) && $response->cpm_result == '00' && $response->cpm_amount == $deposit->amount ) {
            $deposit->status = PAYMENT_COMPLETED_TEXT;
            $deposit->method = $response->payment_method;
            $deposit->save();

        // $user->notify(new TransactionsNotify($deposit));
        } else {
            $deposit->status = PAYMENT_FAILED_TEXT;
            $deposit->save();
        }
    }
}

