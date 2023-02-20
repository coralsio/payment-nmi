<?php

namespace Corals\Modules\Payment\Nmi\Message;

/**
 * NMI Direct Post Refund Request
 */
class DirectPostRefundRequest extends DirectPostCaptureRequest
{
    protected $type = 'refund';
}
