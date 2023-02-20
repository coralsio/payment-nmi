<?php

namespace Corals\Modules\Payment\Nmi\Providers;

use Carbon\Carbon;
use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;

class InstallModuleServiceProvider extends BaseInstallModuleServiceProvider
{
    protected function providerBooted()
    {
        $supported_gateways = \Payments::getAvailableGateways();

        $supported_gateways['Nmi'] = 'Network Merchants';

        \Payments::setAvailableGateways($supported_gateways);


    }
}
