<?php


namespace AppBundle\CheckoutGateway\Stripe\Action;


use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\LogicException;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\GatewayAwareInterface;
use Payum\Core\GatewayAwareTrait;
use Payum\Core\Reply\HttpResponse;
use Payum\Core\Request\GetHttpRequest;
use Payum\Core\Request\RenderTemplate;
use Payum\Stripe\Keys;
use Payum\Stripe\Request\Api\ObtainToken;
use Pimcore\Model\Document;
use Stripe\HttpClient\CurlClient;
use Stripe\StripeClient;

class ObtainTokenAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use ApiAwareTrait {
        setApi as _setApi;
    }

    use GatewayAwareTrait;

    /**
     * @var string
     */
    protected $templateName;

    /**
     * @deprecated BC will be removed in 2.x. Use $this->api
     *
     * @var Keys
     */
    protected $keys;

    /**
     * @param string $templateName
     */
    public function __construct($templateName)
    {
        $this->templateName = $templateName;

        $this->apiClass = Keys::class;
    }

    /**
     * {@inheritDoc}
     */
    public function setApi($api)
    {
        $this->_setApi($api);
    }

    public function execute($request)
    {
        /** @var $request ObtainToken */
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        if ($model['card']) {
            throw new LogicException('The token has already been set.');
        }

        $getHttpRequest = new GetHttpRequest();
        $this->gateway->execute($getHttpRequest);
        if ($getHttpRequest->method == 'POST' && isset($getHttpRequest->request['stripeToken'])) {
            $model['card'] = $getHttpRequest->request['stripeToken'];

            return;
        }

        $pk = 'pk_test_Dis3xCfsENz5JTBKDj0rmWXa00NAJZRl5x';
        $stripe = new StripeClient(
            'sk_test_51GVaHMKKfgcQ3B9jmRUuSusGgfabLWYAozu4Dj8jorImcZibwRXjvLtCs2FAeONOgbo67XmkgH1lZ9WAPC2rsbHO00GmfnS56l'
        );

        $customer = $stripe->customers->retrieve('cus_HfDJemnJy2w43I');

        $defaultPaymentMethod = $stripe->paymentMethods->retrieve($customer->invoice_settings->default_payment_method);

        $this->gateway->execute($renderTemplate = new RenderTemplate($this->templateName, array(
            'model' => $model,
            'default_payment_method' => $defaultPaymentMethod,
            'publishable_key' => $this->api->getPublishableKey(),
            'actionUrl' => $request->getToken() ? $request->getToken()->getTargetUrl() : null,
            'document' => new Document(),
        )));

        throw new HttpResponse($renderTemplate->getResult());
    }

    public function supports($request)
    {
        return
            $request instanceof ObtainToken &&
            $request->getModel() instanceof \ArrayAccess;
    }
}
