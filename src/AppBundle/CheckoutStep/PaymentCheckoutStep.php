<?php

namespace AppBundle\CheckoutStep;

use AppBundle\Form\Type\Checkout\PaymentType;
use CoreShop\Component\Order\Checkout\CheckoutStepInterface;
use CoreShop\Component\Order\Checkout\ValidationCheckoutStepInterface;
use CoreShop\Component\Order\Manager\CartManagerInterface;
use CoreShop\Component\Order\Model\CartInterface;
use CoreShop\Component\Store\Context\StoreContextInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentCheckoutStep implements CheckoutStepInterface, ValidationCheckoutStepInterface
{

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var StoreContextInterface
     */
    private $storeContext;

    /**
     * @var CartManagerInterface
     */
    private $cartManager;

    /**
     * @param FormFactoryInterface  $formFactory
     * @param StoreContextInterface $storeContext
     * @param CartManagerInterface  $cartManager
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        StoreContextInterface $storeContext,
        CartManagerInterface $cartManager
    ) {
        $this->formFactory = $formFactory;
        $this->storeContext = $storeContext;
        $this->cartManager = $cartManager;
    }


    public function getIdentifier()
    {
        return 'payment';
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

    /**
     * @param Request       $request
     * @param CartInterface $cart
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createForm(Request $request, CartInterface $cart)
    {
        $form = $this->formFactory->createNamed('', PaymentType::class, $cart, [
            'payment_subject' => $cart,
        ]);

        if ($request->isMethod('post')) {
            $form = $form->handleRequest($request);
        }

        return $form;
    }
}
