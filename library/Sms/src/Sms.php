<?php

namespace Library\Sms;

use GuzzleHttp\Client;

class Sms
{
    private $baseUrl = "http://api.icombd.com:9000/api/v1/campaigns/sendsms/plain";
    private $username = 'brosoft';
    private $password = 'brosoft@261';
    private $sender = '03590602016';
    private $message = '';
    private $to = '';

    public function sender($sender){
        $this->sender = $sender;
        return $this;
    }

    public function message($message){
        $this->message = $message;
        return $this;
    }

    public function to($number){
        $this->to = '88'.$number;
        return $this;
    }

    public function send(){
        $client = new Client();
        return $client->get($this->baseUrl,[
            'query' => [
                'username'=>$this->username,
                'password'=>$this->password,
                'sender'=>$this->sender,
                'text'=>$this->message,
                'to'=>$this->to
            ]
        ])->getBody();
    }
}
