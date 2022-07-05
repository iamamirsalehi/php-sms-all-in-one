<?php

namespace Iamamirsalehi\Sms\DTOs;

use Iamamirsalehi\Sms\Abstracts\DTOs\DTOInterface;

class GhasedakDTO implements DTOInterface
{
    public $receptor;
    public $lineNumber;
    public $message;
    public $sendDate;
    public $checkId;

    /**
     * @return mixed
     */
    public function getReceptor()
    {
        return $this->receptor;
    }

    /**
     * @return mixed
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * @return mixed
     */
    public function getCheckId()
    {
        return $this->checkId;
    }
}