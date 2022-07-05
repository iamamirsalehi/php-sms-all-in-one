<?php

namespace Iamamirsalehi\Sms\Abstracts\Providers;

use Iamamirsalehi\Sms\Abstracts\DTOs\DTOInterface;

interface ProviderAbstract
{
    public function send(DTOInterface $data): array;
}