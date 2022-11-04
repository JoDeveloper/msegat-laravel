<?php

namespace jodeveloper\Msegat\Services;

use jodeveloper\Msegat\Contracts\Msegat;
use jodeveloper\Msegat\Interfaces\MsegatOTPInterface;
use jodeveloper\Msegat\Traits\MsegatAPIRequest;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class MsegatSendOTP extends Msegat implements MsegatOTPInterface
{
    use MsegatAPIRequest;


    private string $otp;

    /**
     * Initialize API Processor Constructor.
     * Accept All Msegat API Parameters.
     */
    public function __construct(array $config)
    {
        // Call parent constructor to initialize common settings
        parent::__construct($config);
    }

    /**
     * Bulk of numbers to send SMS.
     *
     * @param  array  $numbers
     * @param  string $otp
     * @return $this
     */
    public function numbers(array $numbers,$otp = null): static
    {
        $this->config['numbers'] = $this->renderNumbers($numbers);

        $this->otp = $otp;

        return $this;
    }

    /**
     * OTP Message Generator.
     *
     * @return $this
     */
    protected function generateOTPMessage(): static
    {

        $message = Str::of('Pin Code is : ')->append($this->otp);

        $this->config['msg'] = $message;

        return $this;
    }

    /**
     * Submit SMS to MSEGAT API.
     *
     * @return JsonResponse
     *
     * @throws \Throwable
     */
    public function send(): JsonResponse
    {
        $this->generateOTPMessage(); // Generate Message

        return response()->json(['response' => $this->SendSMSRequest(), 'pin' => $this->otp]);
    }
}
