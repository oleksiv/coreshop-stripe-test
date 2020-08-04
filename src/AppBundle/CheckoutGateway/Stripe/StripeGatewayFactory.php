<?php

namespace AppBundle\CheckoutGateway\Stripe;

use AppBundle\CheckoutGateway\Stripe\Action\AuthorizeAction;
use AppBundle\CheckoutGateway\Stripe\Action\CancelAction;
use AppBundle\CheckoutGateway\Stripe\Action\CaptureAction;
use AppBundle\CheckoutGateway\Stripe\Action\ConvertPaymentAction;
use AppBundle\CheckoutGateway\Stripe\Action\NotifyAction;
use AppBundle\CheckoutGateway\Stripe\Action\ObtainTokenAction;
use AppBundle\CheckoutGateway\Stripe\Action\RefundAction;
use AppBundle\CheckoutGateway\Stripe\Action\StatusAction;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;
use Payum\Stripe\Keys;

class StripeGatewayFactory extends GatewayFactory
{
    /**
     * {@inheritDoc}
     */
    protected function populateConfig(ArrayObject $config)
    {
        $config->defaults([
            'payum.factory_name' => 'stripe_js',
            'payum.factory_title' => 'stripe_js',
            'payum.action.capture' => new CaptureAction(),
            'payum.action.authorize' => new AuthorizeAction(),
            'payum.action.refund' => new RefundAction(),
            'payum.action.cancel' => new CancelAction(),
            'payum.action.notify' => new NotifyAction(),
            'payum.action.status' => new StatusAction(),
            'payum.action.convert_payment' => new ConvertPaymentAction(),
            'payum.action.obtain_token' => function (ArrayObject $config) {
                return new ObtainTokenAction($config['payum.template.obtain_token']);
            },
            'payum.template.obtain_token' => '@AppBundle/Resources/views/Checkout/obtain_js_token.html.twig',
        ]);

        if (false == $config['payum.api']) {
            $config['payum.default_options'] = [
                'publishable_key' => '',
                'secret_key' => ''
            ];
            $config->defaults($config['payum.default_options']);
            $config['payum.required_options'] = ['publishable_key', 'secret_key'];

            $config['payum.api'] = function (ArrayObject $config) {
                $config->validateNotEmpty($config['payum.required_options']);

                return new Keys($config['publishable_key'], $config['secret_key']);
            };
        }
    }
}
