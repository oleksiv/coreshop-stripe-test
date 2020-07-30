<?php

namespace AppBundle\CheckoutStep;

use CoreShop\Component\Order\Checkout\CheckoutStepInterface;
use CoreShop\Component\Order\Model\CartInterface;
use Symfony\Component\HttpFoundation\Request;

class StripePaymentCheckoutStep implements CheckoutStepInterface
{

    public function getIdentifier()
    {
        return 'stripeCheckout';
    }

    public function doAutoForward(CartInterface $cart)
    {
        // TODO: Implement doAutoForward() method.
    }

    public function validate(CartInterface $cart)
    {
        return true;
    }

    public function commitStep(CartInterface $cart, Request $request)
    {
        // TODO: Implement commitStep() method.
    }

    public function prepareStep(CartInterface $cart, Request $request)
    {


        $pk = 'pk_test_Dis3xCfsENz5JTBKDj0rmWXa00NAJZRl5x';
        $stripe = new \Stripe\StripeClient(
            'sk_test_51GVaHMKKfgcQ3B9jmRUuSusGgfabLWYAozu4Dj8jorImcZibwRXjvLtCs2FAeONOgbo67XmkgH1lZ9WAPC2rsbHO00GmfnS56l'
        );



        if ($request->get('defaultPaymentMethod')) {
            $stripe->customers->update('cus_HfDJemnJy2w43I', [
                'invoice_settings' => [
                    'default_payment_method' => $request->get('defaultPaymentMethod'),
                ]
            ]);
        }

        $customer = $stripe->customers->retrieve('cus_HfDJemnJy2w43I');

        $defaultPaymentMethod = $stripe->paymentMethods->retrieve($customer->invoice_settings->default_payment_method);


        $setupIntent = $stripe->setupIntents->create([
            'customer' => 'cus_HfDJemnJy2w43I',
            'usage' => 'off_session',
            'payment_method_types' => [
                'card'
            ],
        ]);

        return [
            'publishable_key' => $pk,
            'default_payment_method' => $defaultPaymentMethod,
            'all_payment_methods' => $stripe->paymentMethods->all([
                'customer' => $customer->id,
                'type' => 'card',
            ]),
            'setup_intent' => $setupIntent->toJSON(),
            'customer' => $customer,
        ];
    }
}
