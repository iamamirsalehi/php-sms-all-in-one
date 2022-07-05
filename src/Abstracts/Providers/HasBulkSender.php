<?php

namespace Iamamirsalehi\Sms\Abstracts\Providers;

interface HasBulkSender
{
    public function sendBulk(array $parameters): array;
}