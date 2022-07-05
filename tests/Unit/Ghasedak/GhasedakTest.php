<?php

use Iamamirsalehi\Sms\Providers\Ghasedak;
use Iamamirsalehi\Sms\Abstracts\ProviderAbstract;

test('can create a instance of Ghasedak class', function (){
    $this->assertInstanceOf(ProviderAbstract::class, new Ghasedak());
});