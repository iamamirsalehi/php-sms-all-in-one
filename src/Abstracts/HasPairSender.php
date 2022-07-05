<?php

namespace Iamamirsalehi\Sms\Abstracts;

interface HasPairSender
{
    public function sendPair(array $parameters): array;
}