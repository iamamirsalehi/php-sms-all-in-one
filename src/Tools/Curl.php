<?php

namespace Iamamirsalehi\Sms\Tools;

use RuntimeException;

class Curl
{
    /**@var string $url */
    private $url;

    /**@var string $apiKey */
    private $apiKey;

    /**@var string $method */
    private $method;

    /**@var array $header */
    private $header = [];

    /**@var string $uri */
    private $uri;

    public function __construct(string $url, string $apiKey)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
    }

    public function asGet(): self
    {
        $this->method = 'GET';

        return $this;
    }

    public function asPOST(): self
    {
        $this->method = 'POST';

        return $this;
    }

    public function addUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function setHeader(array $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function sendRequest(array $parameters = null): array
    {
        $params = http_build_query($parameters);

        $init = curl_init();
        curl_setopt($init, CURLOPT_URL, $this->url . $this->uri);
        curl_setopt($init, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($init, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($init, CURLOPT_POSTFIELDS, $params);

        $result = curl_exec($init);
        $code = curl_getinfo($init, CURLINFO_HTTP_CODE);
        $curlErrno = curl_errno($init);
        $curlError = curl_error($init);
        if ($curlErrno) {
            throw new RuntimeException($curlError, $curlErrno);
        }

        $result = json_decode($result, true);
        if ($code != 200 && is_null($result)) {
            throw new RuntimeException("Request http errors", $code);
        }

        return $result;
    }
}