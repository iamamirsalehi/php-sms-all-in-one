<?php

namespace Iamamirsalehi\Sms\Abstracts;

interface HasBullkSender
{
    public function sendBulk(array $parameters): array;
}