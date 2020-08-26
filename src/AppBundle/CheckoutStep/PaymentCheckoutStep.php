<?php

namespace AppBundle\CheckoutStep;

use AppBundle\Form\Type\Checkout\PaymentType;
use AppBundle\Model\CoreShopCartCustom;
use CoreShop\Bundle\PayumBundle\Model\GatewayConfig;
use CoreShop\Component\Core\Model\PaymentProvider;
use CoreShop\Component\Order\Checkout\CheckoutException;
use CoreShop\Component\Order\Checkout\CheckoutStepInterface;
use CoreShop\Component\Order\Checkout\ValidationCheckoutStepInterface;
use CoreShop\Component\Order\Manager\CartManagerInterface;
use CoreShop\Component\Order\Model\CartInterface;
use CoreShop\Component\Store\Context\StoreContextInterface;
use Payum\Offline\OfflineGatewayFactory;
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
     * @param FormFactoryInterface $formFactory
     * @param StoreContextInterface $storeContext
     * @param CartManagerInterface $cartManager
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        StoreContextInterface $storeContext,
        CartManagerInterface $cartManager
    )
    {
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
        $pk = 'pk_test_Dis3xCfsENz5JTBKDj0rmWXa00NAJZRl5x';
        $stripe = new \Stripe\StripeClient(
            'sk_test_51GVaHMKKfgcQ3B9jmRUuSusGgfabLWYAozu4Dj8jorImcZibwRXjvLtCs2FAeONOgbo67XmkgH1lZ9WAPC2rsbHO00GmfnS56l'
        );

        $customer = $stripe->customers->retrieve($cart->getCustomer()->getId());

//        $defaultPaymentMethod = $stripe->paymentMethods->retrieve($customer->invoice_settings->default_payment_method);

        $form = $this->createForm($request, $cart, $customer->invoice_settings->default_payment_method);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
//                $paymentProvider = new PaymentProvider();
//                $config = new GatewayConfig();
//                $config->setValue('id', 'no_payment');
//                $paymentProvider->setGatewayConfig($config);
//                /** @var CoreShopCartCustom $cart */
//                $cart = $form->getData();
//                $cart->setPaymentProvider($paymentProvider);

                $stripe->customers->update($cart->getCustomer()->getId(), [
                    'invoice_settings' => [
                        'default_payment_method' => $cart->getPaymentMethod()
                    ]
                ]);

                $this->cartManager->persistCart($cart);

                return true;
            } else {
                throw new CheckoutException('Payment Form is invalid', 'coreshop.ui.error.coreshop_checkout_payment_form_invalid');
            }
        }

        return false;
    }

    public function prepareStep(CartInterface $cart, Request $request)
    {


        $pk = 'pk_test_Dis3xCfsENz5JTBKDj0rmWXa00NAJZRl5x';
        $stripe = new \Stripe\StripeClient(
            'sk_test_51GVaHMKKfgcQ3B9jmRUuSusGgfabLWYAozu4Dj8jorImcZibwRXjvLtCs2FAeONOgbo67XmkgH1lZ9WAPC2rsbHO00GmfnS56l'
        );

        try {
            $customer = $stripe->customers->retrieve($cart->getCustomer()->getId());
        } catch(\Exception $exception) {
            $customer = $stripe->customers->create([
                'id' => $cart->getCustomer()->getId(),
                'email' => $cart->getCustomer()->getEmail(),
                'name' => sprintf('%s %s', $cart->getCustomer()->getFirstname(), $cart->getCustomer()->getLastname()),
            ]);
        }

//        var_dump($customer->invoice_settings->default_payment_method);die;
//        $defaultPaymentMethod = null;
//
//        if($customer->invoice_settings->default_payment_method) {
//            $defaultPaymentMethod = $stripe->paymentMethods->retrieve($customer->invoice_settings->default_payment_method);
//        }



        $setupIntent = $stripe->setupIntents->create([
            'customer' => $customer->id,
            'usage' => 'off_session',
            'payment_method_types' => [
                'card'
            ],
        ]);

        return [
            'publishable_key' => $pk,
            'default_payment_method' => $customer->invoice_settings->default_payment_method,
            'all_payment_methods' => $stripe->paymentMethods->all([
                'customer' => $customer->id,
                'type' => 'card',
            ]),
            'setup_intent' => $setupIntent->toJSON(),
            'customer' => $customer,
            'form' => $this->createForm($request, $cart, $customer->invoice_settings->default_payment_method)->createView(),
        ];
    }

    /**
     * @param Request $request
     * @param CartInterface $cart
     *
     * @param $paymentMethod
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createForm(Request $request, CoreShopCartCustom $cart, $paymentMethod)
    {
        $cart->setPaymentMethod($paymentMethod);

        $form = $this->formFactory->createNamed('', PaymentType::class, $cart, [
            'default_payment_method' => $paymentMethod,
        ]);

        if ($request->isMethod('post')) {
            $form = $form->handleRequest($request);
        }

        return $form;
    }
}
