<?php

namespace Iamamirsalehi\Sms\Providers;

use Iamamirsalehi\Sms\Abstracts\ProviderAbstract;

class Ghasedak implements ProviderAbstract
{
    public function __construct()
    {
        
    }

    public function send(string $mobileNumber, string $msg): bool
    {
        return false;
    }
}