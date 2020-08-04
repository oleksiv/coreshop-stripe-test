alert("hello");
pimcore.registerNS('coreshop.provider.gateways.stripe_js');
coreshop.provider.gateways.stripe_js = Class.create(coreshop.provider.gateways.abstract, {

    getLayout: function (config) {
        return [
            {
                xtype: 'textfield',
                fieldLabel: t('stripe_checkout_publishable_key'),
                name: 'gatewayConfig.config.publishable_key',
                length: 255,
                value: config.publishable_key ? config.publishable_key : ""
            },
            {
                xtype: 'textfield',
                fieldLabel: t('stripe_checkout_secret_key'),
                name: 'gatewayConfig.config.secret_key',
                length: 255,
                value: config.secret_key ? config.secret_key : ""
            },
        ];
    }

});