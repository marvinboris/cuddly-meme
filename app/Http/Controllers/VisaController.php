<?php

namespace App\Http\Controllers;

use App\City;
use App\Transaction;
use App\PaymentMethod;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class VisaController extends Controller {


    protected $client; 
    protected $settings; 

    public function __construct(){
        
        $this->settings = PaymentMethod::where('vendor','monetbil')->first();

        $this->client = $this->client = new Client([
            'base_uri' => 'https://www.softeller.com/api_softeller/request_payment',
            'timeout' => 180
        ]);
    }

    /**
     * Retrieve the configuration details 
     */

    public function getConf(Request $request){

        $user = $request->user();
        $city = City::where("id",$user->city_id)->first();

        $userid = '2278';          // votre user id fourni par softeler
        $login = '237655728725';  // login du compte softeller fourni par IWOMI
        $password = '1Pulapula94';     // fourni par iwomi
        $country = 'Cameroun';   // pays ou le client émet la transaction
        $town = 'Douala';     // ville our le client ...
        $amount = '600';     // montant a débité au client (cest le montant exact qui sera débité au client (un entier)
        $first_name = $user->first_name;     // prenom du client
        $last_name = $user->first_name;   // nom du client
        $motif = 'Workoo subscription';  // motif de la transaction
        $phone = $user->phone;      // numéro du client qui sera débité
        $currency = 'XAF';     // devise toujours XAF cest la seule devése traité pour le moment
        $type = 'card';             // type de transaction ('momo',
        $email = $user->email;  // juste pour les transactions visa/mastercard

        $salt = md5($userid);
        $pass = hash('sha256', $salt.$password);

        $json = [
            'Login' => $login,
            'Password' => $pass,
            'Country' => $country,
            'Town' => $town,
            'Amount' => $amount,
            'First_name' => $first_name,
            'Last_name' => $last_name,
            'Motif' => $motif,
            'Phone' => $phone,
            'Type' => $type,
            'Email' => $email	,
            'Currency' => $currency,
        ];

        $response = $this->client->post('https://www.softeller.com/api_softeller/request_payment',[
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'json' => $json
        ]);

       $response = json_decode($response->getBody()->getContents());

       $tx = new Transaction([
            'amount' => $amount,
            'tx_id' => $response->TransactionCode,
            'tx_hash' => $response->TransactionCode,
            'user_id' => $user->id,
            'vendor' => 'visa/mastercard',
            'method' =>  'visa/mastercard', 
            'type' => 'subscription',
            'status' => PAYMENT_PENDING_TEXT,
            'currency' => 'CFA', 
            'address' => $user->phone
        ]);

        $tx->save();
        
       return $response;

    }
}


