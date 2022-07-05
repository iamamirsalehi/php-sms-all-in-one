<?php

namespace Iamamirsalehi\Sms\Abstracts\Providers;

interface HasPairSender
{
    public function sendPair(array $parameters): array;
}