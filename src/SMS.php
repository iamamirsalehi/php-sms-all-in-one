<?php

namespace Iamamirsalehi\Sms;

use Iamamirsalehi\Sms\Abstracts\ProviderAbstract;

class SMS implements ProviderAbstract
{
    /**@var ProviderAbstract $provider */
    private $provider;

    public function __construct(ProviderAbstract $provider)
    {
        $this->provider = $provider;
    }

    public function send(string $mobileNumber, string $msg): bool
    {
        return $this->provider->send($mobileNumber, $msg);
    }
}