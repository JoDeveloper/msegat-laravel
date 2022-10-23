<?php

namespace jodeveloper\Msegat\Interfaces;

interface MsegatOTPInterface
{
    public function numbers(array $numbers);

    public function send();
}
