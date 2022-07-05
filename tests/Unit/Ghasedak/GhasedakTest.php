<?php

use Iamamirsalehi\Sms\Providers\Ghasedak;
use Iamamirsalehi\Sms\Abstracts\ProviderAbstract;

test('can create a instance of Ghasedak class', function (){
    $this->assertInstanceOf(ProviderAbstract::class, new Ghasedak('273462873462834763274'));
});

test('send a simple sms', function (){
    $ghasedak = new \Iamamirsalehi\Sms\SMS(new Ghasedak('2367346273467328462'));
    $ghasedak->send('09392126508', 'Hello Amir');
});