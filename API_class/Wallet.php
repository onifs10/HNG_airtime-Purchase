<?php
namespace Wallet;
class Wallet
{
    public $url;
    private $data;
    private $curl;
    /**
     * @var string
     */
    private $secretKey;

    public function __construct(string $url ,string $secretKey)
    {
        $this->url = $url;
        $this->secretKey = $secretKey;
    }
    public function connect(){
        $this->curl = curl_init($this->url);
        if($this->curl){
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER,['Content-Type: application/json','Authorization: Bearer '.$_ENV['Public_Key']]);
            return $this;
        }else{
            throw new \PDOException('connection failed');
        }
    }
    public function Details(string $networkProvider,int $amount ,string $number ){
        $array = array('Code'=>$networkProvider,"Amount"=>$amount,"PhoneNumber"=>$networkProvider,"SecretKey"=>$this->secretKey);
        $this->data = $array;
        return $this;
    }
    public function send(){
       curl_setopt($this->curl,CURLOPT_POSTFIELDS, json_encode($this->data));
       $return  = curl_exec($this->curl);
       if($return){
           curl_close($this->curl);
           return $return;
       }else{
           throw new \PDOException('Could not send ');
       }
    }
    public function accountDetails(string $currency, string $secretKey){
        $input = array("Currency"=>$currency,"SecretKey"=>$secretKey);
        curl_setopt($this->curl,CURLOPT_POSTFIELDS, json_encode($input));
        return curl_exec($this->curl);
    }




}