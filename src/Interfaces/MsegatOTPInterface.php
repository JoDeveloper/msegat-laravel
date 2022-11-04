<?php

namespace jodeveloper\Msegat\Interfaces;

interface MsegatOTPInterface
{
    public function numbers(array $numbers,int $otp);

    public function send();
}
