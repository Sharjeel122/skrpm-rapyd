<?php

namespace skrpm\rapyd\Library;

class Rapyd
{
    private $secret_key;
    private $access_key;
    public $base_url;
    private $client_ewallet;

    public function __construct($rapyd)
    {
        $this->secret_key = $rapyd['secret_key'];
        $this->access_key = $rapyd['access_key'];
        $this->base_url = $rapyd['base_url'];
        $this->client_ewallet = $rapyd['client_ewallet'];
    }

    public function getCreds()
    {
        return [
            'secret_key' => $this->secret_key,
            'access_key' => $this->access_key,
            'base_url' => $this->base_url,
            'client_ewallet' => $this->client_ewallet
        ];
    }
}

