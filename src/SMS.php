<?php

namespace Iamamirsalehi\Sms;

use Iamamirsalehi\Sms\Abstracts\DTOs\DTOInterface;
use Iamamirsalehi\Sms\Abstracts\Providers\ProviderAbstract;

class SMS implements ProviderAbstract
{
    /**@var ProviderAbstract $provider */
    private $provider;

    public function __construct(ProviderAbstract $provider)
    {
        $this->provider = $provider;
    }

    public function send(DTOInterface $data): array
    {
        return $this->provider->send($data);
    }
}