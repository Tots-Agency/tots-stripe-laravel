<?php

namespace Tots\Stripe\Services;

class TotsStripeService 
{
    protected $secretKey = '';
    /**
     * 
     *
     * @var \Stripe\StripeClient
     */
    protected $stripe;

    public function __construct($config)
    {
        $this->secretKey = $config['secret_key'];
        $this->stripe = new \Stripe\StripeClient($this->secretKey);
    }


    /**
     * Crea un link de pago
     *
     * @param null|array{adaptive_pricing?: array{enabled?: bool}, after_expiration?: array{recovery?: array{allow_promotion_codes?: bool, enabled: bool}}, allow_promotion_codes?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, cancel_url?: string, client_reference_id?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer?: string, customer_creation?: string, customer_email?: string, customer_update?: array{address?: string, name?: string, shipping?: string}, discounts?: array{coupon?: string, promotion_code?: string}[], expand?: string[], expires_at?: int, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: \Stripe\StripeObject, rendering_options?: null|array{amount_tax_display?: null|string}}}, line_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, dynamic_tax_rates?: string[], price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: \Stripe\StripeObject, name: string, tax_code?: string}, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: string[]}[], locale?: string, metadata?: \Stripe\StripeObject, mode?: string, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], payment_intent_data?: array{application_fee_amount?: int, capture_method?: string, description?: string, metadata?: \Stripe\StripeObject, on_behalf_of?: string, receipt_email?: string, setup_future_usage?: string, shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}, transfer_group?: string}, payment_method_collection?: string, payment_method_configuration?: string, payment_method_data?: array{allow_redisplay?: string}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: string, target_date?: string, verification_method?: string}, affirm?: array{setup_future_usage?: string}, afterpay_clearpay?: array{setup_future_usage?: string}, alipay?: array{setup_future_usage?: string}, amazon_pay?: array{setup_future_usage?: string}, au_becs_debit?: array{setup_future_usage?: string, target_date?: string}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, bancontact?: array{setup_future_usage?: string}, boleto?: array{expires_after_days?: int, setup_future_usage?: string}, card?: array{installments?: array{enabled?: bool}, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, restrictions?: array{brands_blocked?: string[]}, setup_future_usage?: string, statement_descriptor_suffix_kana?: string, statement_descriptor_suffix_kanji?: string}, cashapp?: array{setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, eps?: array{setup_future_usage?: string}, fpx?: array{setup_future_usage?: string}, giropay?: array{setup_future_usage?: string}, grabpay?: array{setup_future_usage?: string}, ideal?: array{setup_future_usage?: string}, kakao_pay?: array{capture_method?: string, setup_future_usage?: string}, klarna?: array{setup_future_usage?: string}, konbini?: array{expires_after_days?: int, setup_future_usage?: string}, kr_card?: array{capture_method?: string, setup_future_usage?: string}, link?: array{setup_future_usage?: string}, mobilepay?: array{setup_future_usage?: string}, multibanco?: array{setup_future_usage?: string}, naver_pay?: array{capture_method?: string, setup_future_usage?: string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: array{}, payco?: array{capture_method?: string}, paynow?: array{setup_future_usage?: string}, paypal?: array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, pix?: array{expires_after_seconds?: int}, revolut_pay?: array{setup_future_usage?: string}, samsung_pay?: array{capture_method?: string}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, sofort?: array{setup_future_usage?: string}, swish?: array{reference?: string}, us_bank_account?: array{financial_connections?: array{permissions?: string[], prefetch?: string[]}, setup_future_usage?: string, target_date?: string, verification_method?: string}, wechat_pay?: array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], permissions?: array{update_shipping_details?: string}, phone_number_collection?: array{enabled: bool}, redirect_on_completion?: string, return_url?: string, saved_payment_method_options?: array{allow_redisplay_filters?: string[], payment_method_save?: string}, setup_intent_data?: array{description?: string, metadata?: \Stripe\StripeObject, on_behalf_of?: string}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}[], submit_type?: string, subscription_data?: array{application_fee_percent?: float, billing_cycle_anchor?: int, default_tax_rates?: string[], description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: \Stripe\StripeObject, on_behalf_of?: string, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial_end?: int, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, success_url?: string, tax_id_collection?: array{enabled: bool, required?: string}, ui_mode?: string} $params
     * 
     * @return \Stripe\Checkout\Session
     */
    public function createPaymentCheckoutSession($params)
    {
        return $this->stripe->checkout->sessions->create($params);
    }

    /**
     * Crea un producto en Stripe
     *
     * @param string $name
     * @param string $description
     * 
     * @return \Stripe\Product
     */
    public function createProduc($name, $description)
    {
        return $this->stripe->products->create([
            'name' => $name,
            'description' => $description,
        ]);
    }

    /**
     * Crea un precio para un producto
     *
     * @param string $productId
     * @param int $amount
     * @param string $currency
     * 
     * @return \Stripe\Price
     */
    public function createPrice($productId, $amount, $currency)
    {
        return $this->stripe->prices->create([
            'unit_amount' => $amount,
            'currency' => $currency,
            'product' => $productId,
        ]);
    }

    /**
     * Obtiene todos los medios de pago del cliente guardados
     *
     * @param string $customerId
     * @return array
     */
    public function getPaymentMethodsSaved($customerId)
    {
        return $this->stripe->paymentMethods->all(['customer' => $customerId, 'type' => 'card']);
    }
    /**
     * Elimina una medio de pago
     *
     * @param string $paymentMethodId
     * @return object
     */
    public function removePaymentMethodById($paymentMethodId)
    {
        return $this->stripe->paymentMethods->detach($paymentMethodId);
    }
    /**
     * Crea un webhook
     *
     * @param array $events
     * @param string $url
     * @return void
     */
    public function createWebhook($events, $url)
    {
        return $this->stripe->webhookEndpoints->create([
            'url' => $url,
            'enabled_events' => $events,
        ]);
    }
    /**
     * Obtiene el customer desde Stripe
     * 
     * @param string $customerId
     * @return \Stripe\Customer
     */
    public function getCustomerById($customerId)
    {
        return $this->stripe->customers->retrieve($customerId);
    }
    /**
     * Crear un customer en stripe
     *
     * @param string $name
     * @return \Stripe\Customer
     */
    public function createCustomerByName($name)
    {
        return $this->stripe->customers->create([
            'name' => $name,
        ]);
    }
    /**
     * Crear un customer en stripe
     *
     * @param array $params
     * @return \Stripe\Customer
     */
    public function createCustomer($params)
    {
        return $this->stripe->customers->create($params);
    }
}
