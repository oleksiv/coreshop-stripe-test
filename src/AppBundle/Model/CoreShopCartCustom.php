<?php


namespace AppBundle\Model;


use Pimcore\Model\DataObject\CoreShopCart;
use Stripe\PaymentMethod;

class CoreShopCartCustom extends CoreShopCart
{
    protected $paymentMethod;

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;

        return $this;
    }
}
