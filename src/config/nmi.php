<?php

return [
    'name' => 'Nmi',
    'key' => 'payment_nmi',
    'support_subscription' => false,
    'support_ecommerce' => true,
    'support_marketplace' => true,
    'manage_remote_plan' => false,
    'manage_remote_product' => false,
    'manage_remote_sku' => false,
    'manage_remote_order' => false,
    'supports_swap' => false,
    'supports_swap_in_grace_period' => false,
    'require_invoice_creation' => false,
    'require_plan_activation' => false,
    'capture_payment_method' => false,
    'require_default_payment_set' => false,
    'can_update_payment' => false,
    'create_remote_customer' => false,
    'require_payment_token' => false,
    'default_subscription_status' => 'pending',
    'offline_management' => false,

    'settings' => [
        'live_username' => [
            'label' => 'Nmi::labels.settings.live_username',
            'type' => 'text',
            'required' => false,
        ],
        'live_password' => [
            'label' => 'Nmi::labels.settings.live_password',
            'type' => 'text',
            'required' => false,
        ],
        'live_public_key' => [
            'label' => 'Nmi::labels.settings.live_public_key',
            'type' => 'text',
            'required' => false,
        ],
        'sandbox_mode' => [
            'label' => 'Nmi::labels.settings.sandbox_mode',
            'type' => 'boolean'
        ],
        'sandbox_username' => [
            'label' => 'Nmi::labels.settings.sandbox_username',
            'type' => 'text',
            'required' => false,
        ],
        'sandbox_password' => [
            'label' => 'Nmi::labels.settings.sandbox_password',
            'type' => 'text',
            'required' => false,
        ],
        'sandbox_public_key' => [
            'label' => 'Nmi::labels.settings.sandbox_public_key',
            'type' => 'text',
            'required' => false,
        ],
    ],
    'events' => [

    ],
    'webhook_handler' => '',
];
