<?php

namespace Corals\Modules\Payment\Nmi\Message;

/**
 * NMI Direct Post Credit Request
 */
class DirectPostCreditRequest extends DirectPostAuthRequest
{
    protected $type = 'credit';
}
