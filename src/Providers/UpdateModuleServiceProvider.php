<?php

namespace Corals\Modules\Payment\Nmi\Providers;

use Corals\Foundation\Providers\BaseUpdateModuleServiceProvider;

class UpdateModuleServiceProvider extends BaseUpdateModuleServiceProvider
{
    protected $module_code = 'corals-payment-cash';
    protected $batches_path = __DIR__ . '/../update-batches/*.php';
}
