<?php

namespace Iamamirsalehi\Sms\Abstracts;

interface ProviderAbstract 
{
    public function send(string $mobileNumber, string $msg): array;
}