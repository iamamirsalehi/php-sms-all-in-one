<?php

namespace Iamamirsalehi\Sms\Providers;

use Iamamirsalehi\Sms\Abstracts\ProviderAbstract;
use Iamamirsalehi\Sms\Tools\Curl;

class Ghasedak implements ProviderAbstract
{
    /**@var string $apiKey */
    private $apiKey;

    /**@var Curl $curl */
    private $curl;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->curl = new Curl('http://api.ghasedak.me/v2/', $this->apiKey);
    }

    public function send(string $mobileNumber, string $msg): array
    {
        return $this->curl->asGet()->setHeader([
            'apikey:' . $this->apiKey,
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8',
        ])->sendRequest();
    }
}