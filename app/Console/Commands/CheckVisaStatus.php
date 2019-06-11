<?php

namespace App\Console\Commands;

use App\Transaction;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class CheckVisaStatus extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkVisaStatus:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check visa/master card status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle( ) {
        $txList = Transaction::where(["vendor"=>"visa/mastercard","status"=>"pending"])->get();

        foreach ($txList as $tx) {
            $this->check( $tx );
        }
    }

    /**
     * Handle the given transaction 
     */

     public function check($tx ){
        
            $userid = '2278';          // votre user id fourni par softeler
            $login = '237655728725';  // login du compte softeller fourni par IWOMI
            $password = '1Pulapula94';     // fourni par iwomi 
            $TransactionCode = $tx->tx_hash;
    
            $salt = md5($userid);
            $pass = hash('sha256', $salt.$password);
    
            $json = [
                'Login' => $login,
                'Password' => $pass,
                'TransactionCode' => $TransactionCode
            ];
            
    
            $client = new Client([
                'base_uri' => 'https://www.softeller.com/api_softeller/request_payment',
                'timeout' => 180
            ]);
    
            $response = $client->post('https://www.softeller.com/api_softeller/check_status',[
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'json' => $json
            ]);
            
            $response = json_decode($response->getBody()->getContents());
    
            if( PAYMENT_COMPLETED_TEXT == $response->status || 'Completed' == $response->status ){
                $tx->status = PAYMENT_COMPLETED_TEXT;
                $tx->save();
    
                error_log( "Transaction saved ");
            }
     }
}
