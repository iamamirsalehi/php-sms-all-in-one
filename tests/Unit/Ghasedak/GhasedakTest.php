<?php

use Iamamirsalehi\Sms\Abstracts\Providers\HasBulkSender;
use Iamamirsalehi\Sms\Abstracts\Providers\HasPairSender;
use Iamamirsalehi\Sms\Abstracts\Providers\ProviderAbstract;
use Iamamirsalehi\Sms\Providers\Ghasedak;
use Iamamirsalehi\Sms\SMS;
use Iamamirsalehi\Sms\DTOs\GhasedakDTO;

test('can create a instance of Ghasedak class', function () {
    $this->assertInstanceOf(ProviderAbstract::class, new Ghasedak('273462873462834763274'));
});

test('Ghasedak has bulk sender', function () {
    $this->assertInstanceOf(HasBulkSender::class, new Ghasedak('273462873462834763274'));
});

test('Ghasedak has pair sender', function () {
    $this->assertInstanceOf(HasPairSender::class, new Ghasedak('273462873462834763274'));
});

test('Ghasedak sends a simple sms', function () {
    $ghasedal = new SMS(new Ghasedak('2374832748324978234'));

    $ghasedatDTO = new GhasedakDTO;
    $ghasedatDTO->message = 'Hi Amir';
    $ghasedatDTO->receptor = '09392126508';

    $result = $ghasedal->send($ghasedatDTO);

    $this->assertIsArray($result);
    $this->assertEquals(200, $result['result']['code']);
});