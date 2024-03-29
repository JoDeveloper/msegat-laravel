<?php

namespace jodeveloper\Msegat\Services;

use jodeveloper\Msegat\Contracts\Msegat;
use jodeveloper\Msegat\Interfaces\MsegatInquiryInterface;
use jodeveloper\Msegat\Traits\MsegatAPIRequest;
use Illuminate\Http\JsonResponse;

class MsegatSenderNamesInquiry extends Msegat implements MsegatInquiryInterface
{
    use MsegatAPIRequest;

    /**
     * Initialize API Processor Constructor.
     * Accept All Msegat API Parameters ( HTTP Body ).
     */
    public function __construct()
    {
        $config['msgEncoding'] = 'UTF8'; // Required for Encoding UTF8
        // Call parent constructor to initialize common settings
        parent::__construct($config);
    }

    /**
     * Get Registered Sender Names.
     *
     * @return JsonResponse
     *
     * @throws \Throwable
     */
    public function get(): JsonResponse
    {
        return response()->json(['response' => $this->senderNamesInquiryRequest()]);
    }
}
