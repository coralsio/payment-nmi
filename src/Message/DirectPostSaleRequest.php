<?php

namespace Corals\Modules\Payment\Nmi\Message;

/**
 * NMI Direct Post Sale Request
 */
class DirectPostSaleRequest extends DirectPostAuthRequest
{
    protected $type = 'sale';

    public function getData()
    {
        $this->validate('payment_token', 'amount', 'currency');

        $data = $this->getBaseData();
        $data['payment_token'] = $this->getPaymentToken();
        $data['currency'] = $this->getCurrency();

        if ($this->getAmount() > 0) {
            $data['amount'] = $this->getAmount();
        }

        return $data;
    }
}
