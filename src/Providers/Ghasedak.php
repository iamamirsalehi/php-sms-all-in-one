<?php

namespace Iamamirsalehi\Sms\Providers;

use Iamamirsalehi\Sms\Abstracts\DTOs\DTOInterface;
use Iamamirsalehi\Sms\Abstracts\Providers\HasBulkSender;
use Iamamirsalehi\Sms\Abstracts\Providers\HasPairSender;
use Iamamirsalehi\Sms\Abstracts\Providers\ProviderAbstract;
use Iamamirsalehi\Sms\Tools\Curl;

class Ghasedak implements ProviderAbstract, HasPairSender, HasBulkSender
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

    public function send(DTOInterface $data): array
    {
        $params = [
            "receptor" => $data->getReceptor(),
            "linenumber" => $data->getLineNumber(),
            "message" => $data->getMessage(),
            "senddate" => $data->getSendDate(),
            "checkid" => $data->getCheckId(),
        ];

        $headers = [
            'apikey:' . $this->apiKey,
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8',
        ];

        return $this->curl->asPOST()->setHeader($headers)->addUri('sms/send/simple')->sendRequest($params);
    }

    public function sendBulk(array $parameters): array
    {
        return [];
    }

    public function sendPair(array $parameters): array
    {
        return [];
    }
}