<?php

declare(strict_types=1);

namespace AppBundle\CheckoutGateway;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;

class StripeJsCheckoutGatewayFactory extends GatewayFactory
{
    /**
     * {@inheritDoc}
     */
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            // Factory
            'payum.factory_name' => 'stripe_js',
            'payum.factory_title' => 'Stripe JS',

        ]);
    }
}
