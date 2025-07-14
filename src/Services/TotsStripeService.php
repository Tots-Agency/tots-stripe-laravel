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
     * Crea un checkout session
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
     * Crea un checkout session
     *
     * @param null|array{adaptive_pricing?: array{enabled?: bool}, after_expiration?: array{recovery?: array{allow_promotion_codes?: bool, enabled: bool}}, allow_promotion_codes?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, cancel_url?: string, client_reference_id?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer?: string, customer_creation?: string, customer_email?: string, customer_update?: array{address?: string, name?: string, shipping?: string}, discounts?: array{coupon?: string, promotion_code?: string}[], expand?: string[], expires_at?: int, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: \Stripe\StripeObject, rendering_options?: null|array{amount_tax_display?: null|string}}}, line_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, dynamic_tax_rates?: string[], price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: \Stripe\StripeObject, name: string, tax_code?: string}, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: string[]}[], locale?: string, metadata?: \Stripe\StripeObject, mode?: string, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], payment_intent_data?: array{application_fee_amount?: int, capture_method?: string, description?: string, metadata?: \Stripe\StripeObject, on_behalf_of?: string, receipt_email?: string, setup_future_usage?: string, shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}, transfer_group?: string}, payment_method_collection?: string, payment_method_configuration?: string, payment_method_data?: array{allow_redisplay?: string}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: string, target_date?: string, verification_method?: string}, affirm?: array{setup_future_usage?: string}, afterpay_clearpay?: array{setup_future_usage?: string}, alipay?: array{setup_future_usage?: string}, amazon_pay?: array{setup_future_usage?: string}, au_becs_debit?: array{setup_future_usage?: string, target_date?: string}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, bancontact?: array{setup_future_usage?: string}, boleto?: array{expires_after_days?: int, setup_future_usage?: string}, card?: array{installments?: array{enabled?: bool}, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, restrictions?: array{brands_blocked?: string[]}, setup_future_usage?: string, statement_descriptor_suffix_kana?: string, statement_descriptor_suffix_kanji?: string}, cashapp?: array{setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, eps?: array{setup_future_usage?: string}, fpx?: array{setup_future_usage?: string}, giropay?: array{setup_future_usage?: string}, grabpay?: array{setup_future_usage?: string}, ideal?: array{setup_future_usage?: string}, kakao_pay?: array{capture_method?: string, setup_future_usage?: string}, klarna?: array{setup_future_usage?: string}, konbini?: array{expires_after_days?: int, setup_future_usage?: string}, kr_card?: array{capture_method?: string, setup_future_usage?: string}, link?: array{setup_future_usage?: string}, mobilepay?: array{setup_future_usage?: string}, multibanco?: array{setup_future_usage?: string}, naver_pay?: array{capture_method?: string, setup_future_usage?: string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: array{}, payco?: array{capture_method?: string}, paynow?: array{setup_future_usage?: string}, paypal?: array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, pix?: array{expires_after_seconds?: int}, revolut_pay?: array{setup_future_usage?: string}, samsung_pay?: array{capture_method?: string}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, sofort?: array{setup_future_usage?: string}, swish?: array{reference?: string}, us_bank_account?: array{financial_connections?: array{permissions?: string[], prefetch?: string[]}, setup_future_usage?: string, target_date?: string, verification_method?: string}, wechat_pay?: array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], permissions?: array{update_shipping_details?: string}, phone_number_collection?: array{enabled: bool}, redirect_on_completion?: string, return_url?: string, saved_payment_method_options?: array{allow_redisplay_filters?: string[], payment_method_save?: string}, setup_intent_data?: array{description?: string, metadata?: \Stripe\StripeObject, on_behalf_of?: string}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}[], submit_type?: string, subscription_data?: array{application_fee_percent?: float, billing_cycle_anchor?: int, default_tax_rates?: string[], description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: \Stripe\StripeObject, on_behalf_of?: string, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial_end?: int, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, success_url?: string, tax_id_collection?: array{enabled: bool, required?: string}, ui_mode?: string} $params
     * 
     * @return \Stripe\Checkout\Session
     */
    public function createPaymentSetupCheckoutSession($customerId, $successUrl, $cancelUrl = null)
    {
        return $this->stripe->checkout->sessions->create([
            'customer' => $customerId,
            'mode' => 'setup',
            'payment_method_types' => ['card'],
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl ?? $successUrl,
        ]);
    }
    /**
     * Obtiene un payment intent por ID
     *
     * @param string $paymentIntentId
     * @return \Stripe\PaymentIntent
     */
    public function getPaymentIntentById($paymentIntentId)
    {
        return $this->stripe->paymentIntents->retrieve($paymentIntentId);
    }
    /**
     * Crea un link de pago publico
     *
     * @param null|array{after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{url: string}, type: string}, allow_promotion_codes?: bool, application_fee_amount?: int, application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer_creation?: string, expand?: string[], inactive_message?: string, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|\Stripe\StripeObject, rendering_options?: null|array{amount_tax_display?: null|string}}}, line_items: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], metadata?: \Stripe\StripeObject, on_behalf_of?: string, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], payment_intent_data?: array{capture_method?: string, description?: string, metadata?: \Stripe\StripeObject, setup_future_usage?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_group?: string}, payment_method_collection?: string, payment_method_types?: string[], phone_number_collection?: array{enabled: bool}, restrictions?: array{completed_sessions: array{limit: int}}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string}[], submit_type?: string, subscription_data?: array{description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: \Stripe\StripeObject, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, tax_id_collection?: array{enabled: bool, required?: string}, transfer_data?: array{amount?: int, destination: string}} $params
     * @return \Stripe\PaymentLink
     */
    public function createPaymentLink($params)
    {
        return $this->stripe->paymentLinks->create($params);
    }

    /**
     * Crea un producto en Stripe
     *
     * @param string $name
     * @param string $description
     * 
     * @return \Stripe\Product
     */
    public function createProduct($name)
    {
        return $this->stripe->products->create([
            'name' => $name
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
     * @return \Stripe\Collection<\Stripe\PaymentMethod>
     */
    public function getPaymentMethodsSaved($customerId)
    {
        return $this->stripe->paymentMethods->all(['customer' => $customerId, 'type' => 'card']);
    }
    /**
     * Obtener el medio de pago por ID
     *
     * @param string $paymentMethodId
     * @return \Stripe\PaymentMethod
     */
    public function getPaymentMethodById($paymentMethodId)
    {
        return $this->stripe->paymentMethods->retrieve($paymentMethodId);
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
    /**
     * Crea un external account en Stripe esto es para tener una cuenta de vendedor que pueda recibir pagos
     *
     * @param null|array{account_token?: string, business_profile?: array{annual_revenue?: array{amount: int, currency: string, fiscal_year_end: string}, estimated_worker_count?: int, mcc?: string, monthly_estimated_revenue?: array{amount: int, currency: string}, name?: string, product_description?: string, support_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, support_email?: string, support_phone?: string, support_url?: null|string, url?: string}, business_type?: string, capabilities?: array{acss_debit_payments?: array{requested?: bool}, affirm_payments?: array{requested?: bool}, afterpay_clearpay_payments?: array{requested?: bool}, alma_payments?: array{requested?: bool}, amazon_pay_payments?: array{requested?: bool}, au_becs_debit_payments?: array{requested?: bool}, bacs_debit_payments?: array{requested?: bool}, bancontact_payments?: array{requested?: bool}, bank_transfer_payments?: array{requested?: bool}, billie_payments?: array{requested?: bool}, blik_payments?: array{requested?: bool}, boleto_payments?: array{requested?: bool}, card_issuing?: array{requested?: bool}, card_payments?: array{requested?: bool}, cartes_bancaires_payments?: array{requested?: bool}, cashapp_payments?: array{requested?: bool}, eps_payments?: array{requested?: bool}, fpx_payments?: array{requested?: bool}, gb_bank_transfer_payments?: array{requested?: bool}, giropay_payments?: array{requested?: bool}, grabpay_payments?: array{requested?: bool}, ideal_payments?: array{requested?: bool}, india_international_payments?: array{requested?: bool}, jcb_payments?: array{requested?: bool}, jp_bank_transfer_payments?: array{requested?: bool}, kakao_pay_payments?: array{requested?: bool}, klarna_payments?: array{requested?: bool}, konbini_payments?: array{requested?: bool}, kr_card_payments?: array{requested?: bool}, legacy_payments?: array{requested?: bool}, link_payments?: array{requested?: bool}, mobilepay_payments?: array{requested?: bool}, multibanco_payments?: array{requested?: bool}, mx_bank_transfer_payments?: array{requested?: bool}, naver_pay_payments?: array{requested?: bool}, nz_bank_account_becs_debit_payments?: array{requested?: bool}, oxxo_payments?: array{requested?: bool}, p24_payments?: array{requested?: bool}, pay_by_bank_payments?: array{requested?: bool}, payco_payments?: array{requested?: bool}, paynow_payments?: array{requested?: bool}, promptpay_payments?: array{requested?: bool}, revolut_pay_payments?: array{requested?: bool}, samsung_pay_payments?: array{requested?: bool}, satispay_payments?: array{requested?: bool}, sepa_bank_transfer_payments?: array{requested?: bool}, sepa_debit_payments?: array{requested?: bool}, sofort_payments?: array{requested?: bool}, swish_payments?: array{requested?: bool}, tax_reporting_us_1099_k?: array{requested?: bool}, tax_reporting_us_1099_misc?: array{requested?: bool}, transfers?: array{requested?: bool}, treasury?: array{requested?: bool}, twint_payments?: array{requested?: bool}, us_bank_account_ach_payments?: array{requested?: bool}, us_bank_transfer_payments?: array{requested?: bool}, zip_payments?: array{requested?: bool}}, company?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, directors_provided?: bool, directorship_declaration?: array{date?: int, ip?: string, user_agent?: string}, executives_provided?: bool, export_license_id?: string, export_purpose_code?: string, name?: string, name_kana?: string, name_kanji?: string, owners_provided?: bool, ownership_declaration?: array{date?: int, ip?: string, user_agent?: string}, ownership_exemption_reason?: null|string, phone?: string, registration_number?: string, structure?: null|string, tax_id?: string, tax_id_registrar?: string, vat_id?: string, verification?: array{document?: array{back?: string, front?: string}}}, controller?: array{fees?: array{payer?: string}, losses?: array{payments?: string}, requirement_collection?: string, stripe_dashboard?: array{type?: string}}, country?: string, default_currency?: string, documents?: array{bank_account_ownership_verification?: array{files?: string[]}, company_license?: array{files?: string[]}, company_memorandum_of_association?: array{files?: string[]}, company_ministerial_decree?: array{files?: string[]}, company_registration_verification?: array{files?: string[]}, company_tax_id_verification?: array{files?: string[]}, proof_of_registration?: array{files?: string[]}, proof_of_ultimate_beneficial_ownership?: array{files?: string[]}}, email?: string, expand?: string[], external_account?: array|string, groups?: array{payments_pricing?: null|string}, individual?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, email?: string, first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: null|float, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}}, metadata?: null|\Stripe\StripeObject, settings?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, card_issuing?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}, statement_descriptor_prefix?: string, statement_descriptor_prefix_kana?: null|string, statement_descriptor_prefix_kanji?: null|string}, invoices?: array{hosted_payment_method_save?: string}, payments?: array{statement_descriptor?: string, statement_descriptor_kana?: string, statement_descriptor_kanji?: string}, payouts?: array{debit_negative_balances?: bool, schedule?: array{delay_days?: array|int|string, interval?: string, monthly_anchor?: int, weekly_anchor?: string}, statement_descriptor?: string}, treasury?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}}, tos_acceptance?: array{date?: int, ip?: string, service_agreement?: string, user_agent?: string}, type?: string} $params
     * 
     * @return \Stripe\Account
     */
    public function createAccount($params)
    {
        return $this->stripe->accounts->create($params);
    }
    /**
     * Crear un account link para el onboarding de Connect
     *
     * @param null|array{account: string, collect?: string, collection_options?: array{fields?: string, future_requirements?: string}, expand?: string[], refresh_url?: string, return_url?: string, type: string} $params
     * @return \Stripe\AccountLink
     */
    public function createAccountLink($params)
    {
        return $this->stripe->accountLinks->create($params);
    }
    /**
     * Crea un account link para el onboarding de Connect desde una cuenta nueva
     *
     * @param null|array{account: string, collect?: string, collection_options?: array{fields?: string, future_requirements?: string}, expand?: string[], refresh_url?: string, return_url?: string, type: string} $params
     * @return \Stripe\AccountLink
     */
    public function createAccountLinkFromNewAccount($params)
    {
        $account = $this->createAccount([]);
        return $this->createAccountLink([
            'account' => $account->id,
            'refresh_url' => $params['refresh_url'] ?? '',
            'return_url' => $params['return_url'] ?? '',
            'type' => 'account_onboarding',
        ]);
    }
    /**
     * Crea una cuenta bancaria en una cuenta de Stripe Connect
     *
     * @param string $accountId
     * @param array|string $params
     * 
     * @return \Stripe\BankAccount
     */
    public function createBankAccountInAccount($accountId, $params)
    {
        return $this->stripe->accounts->createExternalAccount($accountId, [
            'external_account' => $params,
        ]);
    }
    /**
     * Obtiene las cuentas bancarias de una cuenta de Stripe Connect
     *
     * @param string $accountId
     * @return \Stripe\Collection<\Stripe\BankAccount>
     */
    public function getBankAccountsByAccount($accountId)
    {
        return $this->stripe->accounts->allExternalAccounts($accountId, [
            'object' => 'bank_account',
        ]);
    }
    /**
     * Elimina una cuenta bancaria de una cuenta de Stripe Connect
     *
     * @param string $accountId
     * @param string $bankAccountId
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public function removeBankAccountById($accountId, $bankAccountId)
    {
        return $this->stripe->accounts->deleteExternalAccount($accountId, $bankAccountId);
    }
}
