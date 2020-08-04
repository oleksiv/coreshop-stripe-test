<?php


namespace AppBundle\Controller;


use CoreShop\Component\Core\Model\Cart;
use CoreShop\Component\Order\Context\CartContextInterface;
use Payum\Bundle\PayumBundle\Controller\PayumController;
use Payum\Core\Payum;
use Payum\Core\Request\Capture;
use Symfony\Component\HttpFoundation\Request;

class CaptureController extends PayumController
{

    /**
     * @var Payum
     */
    private $payum;
    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Payum $payum, CartContextInterface $cart)
    {

        $this->payum = $payum;
        $this->cart = $cart;
    }

    public function doAction(Request $request)
    {
        $token = $this->getPayum()->getHttpRequestVerifier()->verify($request);

        $model = [
            'cart' => $this->getCart(),
        ];
        $capture = new Capture($token);
        $capture->setModel($model);


        $gateway = $this->getPayum()->getGateway($token->getGatewayName());
        $gateway->execute($capture);

        $this->getPayum()->getHttpRequestVerifier()->invalidate($token);

        return $this->redirect($token->getAfterUrl());
    }

    protected function getPayum()
    {
        return $this->payum;
    }

    protected function getCartContext()
    {
        return $this->cart;
    }

    protected function getCart()
    {
        return $this->getCartContext()->getCart();
    }
}
