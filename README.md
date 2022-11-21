
# Laravel Rapyd Package

This package is about Rapyd payment method, you can easily use the Rapyd functionality through this package, This package contains config files and more. Through this package you can get/send payment using Rapyd, you just need to install this package, Installation is very simple all the steps are given below
#


## Badges

[![stable License](https://img.shields.io/badge/License-Stable%20v1-orange.svg)](https://github.com/Sharjeel122/skrpm-rapyd)
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/Sharjeel122/skrpm-rapyd)
[![Test License](https://img.shields.io/badge/license-Test%20Passed-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`RAPYD_SECRET_KEY`

`RAPYD_ACCESS_KEY`

`RAPYD_CLIENT_EWALLET`

`RAPYD_BASE_URL`


## Installation

Install skrpm/rapyd with cmd

```bash
  composer require skrpm/rapyd install skrpm/rapyd
  cd laravel root file
```


```bash
  In composer you need to add
   "autoload": {
        "psr-4": {
           "skrpm\\rapyd\\": "vendor/skrpm/Rapyd/src"
        }
    }
```
### Add these lines in to config/app.php
```bash
  ---Provider---
  \skrpm\rapyd\RapydServiceProvider::class,

  ---Alias---
  'RPM' => \skrpm\rapyd\Facades\Rapyd::class,
```

```bash
  Run command 
  composer dump-autoload

  &&

    php artisan vendor:publish --provider="skrpm\rapyd\RapydServiceProvider"
```
Congratulation you installed the package successfully, Now we are moving how to use this pacakge

## Quick Usage Example

```php
add namespace
use skrpm\rapyd\Controller\SkRapydController;

//you can rename $rapyd variable with any unique variable
$rapyd = (new SkRapydController())->skRapydResponse($data);
```

```php
check response back you can json_encode/die-dump(dd)/print_r this variable


$rapyd = (new SkRapydController())->skRapydResponse($data);
dd($rapyd);
```

# Some Example related to package

## Example 1
### check balance in rapyd wallet
//add appropriate wallet id 

GET// https://sandboxapi.rapyd.net/v1/user/ewallet_*********

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be empty for GET call
     */

 $data = [
            'method' => 'get',
            'path' => '/v1/user/ewallet_42206f08ea0fde58dcf584e9aa79330d',
            'body'=>[],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```response
  **Response**

  {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "a38a12c4-643b-4782-b4e4-620ded8e73c9"
  },
  "data": {
    "phone_number": null,
    "email": null,
    "first_name": "Henry Company",
    "last_name": null,
    "id": "ewallet_***************",
    "status": "ACT",
    "accounts": [
      {
        "id": "0578aa4b-ebcf-4b24-9802-e947bc065013",
        "currency": "USD",
        "alias": "USD",
        "balance": 404042.62,
        "received_balance": 0,
        "on_hold_balance": 0,
        "reserve_balance": 0,
        "limits": null,
        "limit": null
      }
    ],
    "verification_status": "not verified",
    "type": "company",
    "metadata": {
      "merchant_defined": true
    },
    "ewallet_reference_id": "Test-888",
    "category": null,
    "contacts": {
      "data": [
        {
          "id": "cont_6e41a4f3ceaed4c66478c17e05340d19",
          "first_name": "Mary",
          "last_name": "Chen",
          "middle_name": "",
          "second_last_name": "",
          "gender": "not_applicable",
          "marital_status": "not_applicable",
          "house_type": "",
          "contact_type": "business",
          "phone_number": "+14155588799",
          "email": "sanboxtest@rapyd.net",
          "identification_type": "PA",
          "identification_number": "1234567890",
          "issued_card_data": {
            "preferred_name": "",
            "transaction_permissions": "",
            "role_in_company": ""
          },
          "date_of_birth": "2000-11-22",
          "country": "US",
          "nationality": "NL",
          "address": {
            "id": "address_c93aaac68eeda43268d945c5a64d9e67",
            "name": "Henry Company",
            "line_1": "888 Some Street",
            "line_2": "",
            "line_3": "",
            "city": "Anytown",
            "state": "NY",
            "country": "US",
            "zip": "12345",
            "phone_number": "+14155588799",
            "metadata": {},
            "canton": "",
            "district": "",
            "created_at": 1666251558
          },
          "ewallet": "ewallet_42206f08ea0fde58dcf584e9aa79330d",
          "created_at": 1666251558,
          "metadata": {
            "merchant_defined": true
          },
          "business_details": {
            "id": "busi_5c27db852abf662818ddf810d01653a2",
            "name": "Henry Company",
            "registration_number": "4234567779",
            "entity_type": "company",
            "industry_category": "company",
            "industry_sub_category": "home services",
            "address": {
              "id": "address_b0ded8ae4988ae77fbe61ac4265b14d6",
              "name": "Henry Company",
              "line_1": "888 Some Street",
              "line_2": "Suite 1200",
              "line_3": "",
              "city": "Anytown",
              "state": "NY",
              "country": "US",
              "zip": "10101",
              "phone_number": "+14155588799",
              "metadata": {
                "merchant_defined": true
              },
              "canton": "",
              "district": "",
              "created_at": 1666251558
            },
            "created_at": 1666251558,
            "annual_revenue": 0,
            "establishment_date": null,
            "legal_entity_type": null,
            "cnae_code": null
          },
          "compliance_profile": 0,
          "verification_status": "not verified",
          "send_notifications": false,
          "mothers_name": "Mei Hui"
        },
        {
          "id": "cont_689b8729cedd88aef87bfe49bd86db48",
          "first_name": "Jane",
          "last_name": "Doe",
          "middle_name": "",
          "second_last_name": "",
          "gender": "female",
          "marital_status": "single",
          "house_type": "lease",
          "contact_type": "personal",
          "phone_number": "+14155551233",
          "email": "jane200@rapyd.net",
          "identification_type": "PA",
          "identification_number": "1233242424",
          "issued_card_data": {
            "preferred_name": "",
            "transaction_permissions": "",
            "role_in_company": ""
          },
          "date_of_birth": "2000-11-22",
          "country": "US",
          "nationality": "FR",
          "address": {
            "id": "address_679feffb07d91777b8755c1748933d11",
            "name": "Jane Doe",
            "line_1": "123 Lake Forest Drive",
            "line_2": "",
            "line_3": "",
            "city": "Anytown",
            "state": "NY",
            "country": "",
            "zip": "12345",
            "phone_number": "+14155551234",
            "metadata": {
              "merchant_defined": true
            },
            "canton": "",
            "district": "",
            "created_at": 1666267734
          },
          "ewallet": "ewallet_8***********",
          "created_at": 1666267735,
          "metadata": {
            "merchant_defined": true
          },
          "business_details": null,
          "compliance_profile": 0,
          "verification_status": "not verified",
          "send_notifications": false,
          "mothers_name": "Jane Smith"
        }
      ],
      "has_more": false,
      "total_count": 2,
      "url": "/v1/ewallets/ewallet_**********
      /contacts"
    }
  }
}

```

## Example 2
### checkout - you can get payment through the checkout link

POST// https://sandboxapi.rapyd.net/v1/checkout

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * This call is important for ecommerce websites
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be not empty for POST call
     */

 $data = [
            'method' => 'post',
            'path' => '/v1/checkout',
            'body'=>[
                "amount" => '2000',
                "complete_checkout_url" => 'http://example.com/complete',
                "country" => 'US',
                "currency" => 'USD',
                "cancel_checkout_url" => 'http://example.com/error',
                "language" => 'en',
            ],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```response

 **Response**

 {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "1283d1a6-8250-487c-85d3-117262f7736c"
  },
  "data": {
    "id": "checkout_5e5e4debbcf32a56aeeb08816b22c6fe",
    "status": "NEW",
    "language": "en",
    "merchant_color": null,
    "merchant_logo": null,
    "merchant_website": "https://www.rapyd.net",
    "merchant_customer_support": {},
    "merchant_alias": "N/A",
    "merchant_terms": null,
    "merchant_privacy_policy": null,
    "page_expiration": 1670222158,
    "redirect_url": "https://sandboxcheckout.rapyd.net?token=checkout_5e5e4debbcf32a56aeeb08816b22c6fe",
    "merchant_main_button": "place_your_order",
    "cancel_checkout_url": "http://example.com/error",
    "complete_checkout_url": "http://example.com/complete",
    "country": "US",
    "currency": "USD",
    "amount": 2000,
    "payment": {
      "id": null,
      "amount": 2000,
      "original_amount": 0,
      "is_partial": false,
      "currency_code": "USD",
      "country_code": "US",
      "status": null,
      "description": "Payment via Checkout",
      "merchant_reference_id": null,
      "customer_token": null,
      "payment_method": null,
      "payment_method_data": {},
      "expiration": 0,
      "captured": false,
      "refunded": false,
      "refunded_amount": 0,
      "receipt_email": null,
      "redirect_url": null,
      "complete_payment_url": null,
      "error_payment_url": null,
      "receipt_number": null,
      "flow_type": null,
      "address": null,
      "statement_descriptor": null,
      "transaction_id": null,
      "created_at": 0,
      "updated_at": 0,
      "metadata": null,
      "failure_code": null,
      "failure_message": null,
      "paid": false,
      "paid_at": 0,
      "dispute": null,
      "refunds": null,
      "order": null,
      "outcome": null,
      "visual_codes": {},
      "textual_codes": {},
      "instructions": {},
      "ewallet_id": null,
      "ewallets": [],
      "payment_method_options": {},
      "payment_method_type": null,
      "payment_method_type_category": null,
      "fx_rate": null,
      "merchant_requested_currency": null,
      "merchant_requested_amount": null,
      "fixed_side": null,
      "payment_fees": null,
      "invoice": null,
      "escrow": null,
      "group_payment": null,
      "cancel_reason": null,
      "initiation_type": "customer_present",
      "mid": null,
      "next_action": "not_applicable"
    },
    "payment_method_type": null,
    "payment_method_type_categories": null,
    "payment_method_types_include": null,
    "payment_method_types_exclude": null,
    "account_funding_transaction": null,
    "customer": null,
    "custom_elements": {
      "save_card_default": false,
      "display_description": false,
      "payment_fees_display": true,
      "merchant_currency_only": false,
      "billing_address_collect": false,
      "dynamic_currency_conversion": false
    },
    "timestamp": 1669012558,
    "payment_expiration": null,
    "cart_items": [],
    "escrow": null,
    "escrow_release_days": null
  }
}

```

## Example 3
### checkout details - you can get checkout details by using specific checkout id

GET// https://sandboxapi.rapyd.net/v1/checkout/checkout_*************

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * via this call you will get status and all the related details and you can store in database
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be empty for GET call
     */

 $data = [
            'method' => 'get',
            'path' => '/v1/checkout/checkout_5e5e4debbcf32a56aeeb08816b22c6fe',
            'body'=>[],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```response

    **Response**

    {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "ba9e42be-15c8-4ce6-b31a-4641fa4b14a4"
  },
  "data": {
    "id": "checkout_5e5e4debbcf32a56aeeb08816b22c6fe",
    "status": "NEW",
    "language": "en",
    "merchant_color": null,
    "merchant_logo": null,
    "merchant_website": "https://www.rapyd.net",
    "merchant_customer_support": {},
    "merchant_alias": "N/A",
    "merchant_terms": null,
    "merchant_privacy_policy": null,
    "page_expiration": 1670222158,
    "redirect_url": "https://sandboxcheckout.rapyd.net?token=checkout_5e5e4debbcf32a56aeeb08816b22c6fe",
    "region": "APAC",
    "geo_country": "PK",
    "merchant_main_button": "place_your_order",
    "cancel_checkout_url": "http://example.com/error",
    "complete_checkout_url": "http://example.com/complete",
    "country": "US",
    "currency": "USD",
    "amount": 2000,
    "payment": {
      "id": null,
      "amount": 2000,
      "original_amount": 0,
      "is_partial": false,
      "currency_code": "USD",
      "country_code": "US",
      "status": null,
      "description": "Payment via Checkout",
      "merchant_reference_id": null,
      "customer_token": null,
      "payment_method": null,
      "payment_method_data": {},
      "expiration": 0,
      "captured": false,
      "refunded": false,
      "refunded_amount": 0,
      "receipt_email": null,
      "redirect_url": null,
      "complete_payment_url": null,
      "error_payment_url": null,
      "receipt_number": null,
      "flow_type": null,
      "address": null,
      "statement_descriptor": null,
      "transaction_id": null,
      "created_at": 0,
      "updated_at": 0,
      "metadata": null,
      "failure_code": null,
      "failure_message": null,
      "paid": false,
      "paid_at": 0,
      "dispute": null,
      "refunds": null,
      "order": null,
      "outcome": null,
      "visual_codes": {},
      "textual_codes": {},
      "instructions": {},
      "ewallet_id": null,
      "ewallets": [],
      "payment_method_options": {},
      "payment_method_type": null,
      "payment_method_type_category": null,
      "fx_rate": null,
      "merchant_requested_currency": null,
      "merchant_requested_amount": null,
      "fixed_side": null,
      "payment_fees": null,
      "invoice": null,
      "escrow": null,
      "group_payment": null,
      "cancel_reason": null,
      "initiation_type": "customer_present",
      "mid": null,
      "next_action": "not_applicable"
    },
    "payment_method_type": null,
    "payment_method_type_categories": null,
    "payment_method_types_include": null,
    "payment_method_types_exclude": null,
    "account_funding_transaction": null,
    "customer": null,
    "custom_elements": {
      "save_card_default": false,
      "display_description": false,
      "payment_fees_display": true,
      "merchant_currency_only": false,
      "billing_address_collect": false,
      "dynamic_currency_conversion": false
    },
    "timestamp": 1669012558,
    "payment_expiration": null,
    "cart_items": [],
    "escrow": null,
    "escrow_release_days": null,
    "payment_method_types": [
      {
        "category": "card",
        "order": 0,
        "types": [
          {
            "type": "us_debit_visa_card",
            "mapping": [
              {
                "brand": "visa",
                "card_types": [
                  "debit"
                ]
              }
            ],
            "order": 0,
            "image": "https://iconslib.rapyd.net/checkout/us_debit_visa_card.png",
            "instructions": [],
            "name": "Visa Debit",
            "fields": [
              {
                "name": "number",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card number"
              },
              {
                "name": "expiration_month",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration month as string, 01-12"
              },
              {
                "name": "expiration_year",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration year in to digits as string, 18-99"
              },
              {
                "name": "name",
                "type": "string",
                "regex": null,
                "is_required": false,
                "instructions": "card holder name"
              },
              {
                "name": "cvv",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card cvv"
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [
              {
                "name": "3d_required",
                "type": "string",
                "regex": null,
                "description": "Allows the client to determine whether the customer is required to complete 3DS authentication for the transaction",
                "is_required": false,
                "is_updatable": false
              }
            ],
            "payment_options": [
              {
                "name": "customer",
                "type": "customer",
                "regex": null,
                "description": "updated the customer to: make sure a customer was created with first_name, last_name and address with Country(ISO 3166),state(US Postal Service 2-letter code),city, line1, zipcode",
                "is_required": true,
                "is_updatable": false
              }
            ],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          },
          {
            "type": "us_debit_discover_card",
            "mapping": [
              {
                "brand": "discover",
                "card_types": [
                  "debit"
                ]
              }
            ],
            "order": 1,
            "image": "https://iconslib.rapyd.net/checkout/us_debit_discover_card.png",
            "instructions": [],
            "name": "Discover",
            "fields": [
              {
                "name": "number",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card number"
              },
              {
                "name": "expiration_month",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration month as string, 01-12"
              },
              {
                "name": "expiration_year",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration year in to digits as string, 18-99"
              },
              {
                "name": "name",
                "type": "string",
                "regex": null,
                "is_required": false,
                "instructions": "card holder name"
              },
              {
                "name": "cvv",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card cvv"
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [
              {
                "name": "3d_required",
                "type": "string",
                "regex": null,
                "description": "Allows the client to determine whether the customer is required to complete 3DS authentication for the transaction",
                "is_required": false,
                "is_updatable": false
              }
            ],
            "payment_options": [
              {
                "name": "customer",
                "type": "customer",
                "regex": null,
                "description": "updated the customer to: make sure a customer was created with first_name, last_name and address with Country(ISO 3166),state(US Postal Service 2-letter code),city, line1, zipcode",
                "is_required": true,
                "is_updatable": false
              }
            ],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          },
          {
            "type": "us_debit_mastercard_card",
            "mapping": [
              {
                "brand": "mastercard",
                "card_types": [
                  "debit"
                ]
              }
            ],
            "order": 2,
            "image": "https://iconslib.rapyd.net/checkout/us_debit_mastercard_card.png",
            "instructions": [],
            "name": "Mastercard",
            "fields": [
              {
                "name": "number",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card number"
              },
              {
                "name": "expiration_month",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration month as string, 01-12"
              },
              {
                "name": "expiration_year",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "expiration year in to digits as string, 18-99"
              },
              {
                "name": "name",
                "type": "string",
                "regex": null,
                "is_required": false,
                "instructions": "card holder name"
              },
              {
                "name": "cvv",
                "type": "string",
                "regex": null,
                "is_required": true,
                "instructions": "card cvv"
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [
              {
                "name": "3d_required",
                "type": "string",
                "regex": null,
                "description": "Allows the client to determine whether the customer is required to complete 3DS authentication for the transaction",
                "is_required": false,
                "is_updatable": false
              }
            ],
            "payment_options": [
              {
                "name": "customer",
                "type": "customer",
                "regex": null,
                "description": "updated the customer to: make sure a customer was created with first_name, last_name and address with Country(ISO 3166),state(US Postal Service 2-letter code),city, line1, zipcode",
                "is_required": true,
                "is_updatable": false
              }
            ],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          }
        ]
      },
      {
        "category": "cash",
        "order": 1,
        "types": [
          {
            "type": "us_multiplestoresother_cash",
            "mapping": null,
            "order": 0,
            "image": "https://iconslib.rapyd.net/checkout/us_multiplestoresother_cash.png",
            "instructions": [
              {
                "name": "instructions",
                "steps": [
                  {
                    "step1": "Please visit any one of your nearest participating Family Dollar, Dollar General, CVS, 7Eleven, Speedway, or Kum and Go, Royal Farms, Pilot Flying, or Go Mart stores",
                    "step2": "Present your barcode to be scanned at the register and the exact $ amount for which the barcode was generated",
                    "step3": "Provide cash to complete your payment.",
                    "step4": "Keep your receipt as proof of payment."
                  }
                ],
                "terms & conditions": "By accepting or using this barcode to make a payment, you agree to the full terms and conditions, available at ​vanilladirect.com/pay/terms​. After successful payment using this barcode, you may retrieve your full detailed e-receipt at vanilladirect.com/pay/ereceipt​"
              }
            ],
            "name": "Cash Payment in US",
            "fields": [],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [],
            "payment_options": [],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          },
          {
            "type": "us_familydollar_cash",
            "mapping": null,
            "order": 1,
            "image": "https://iconslib.rapyd.net/checkout/us_familydollar_cash.png",
            "instructions": [
              {
                "name": "instructions",
                "steps": [
                  {
                    "step1": "Please visit any one of your nearest participating Family Dollar stores.",
                    "step2": "Present your barcode to be scanned at the register and the exact $ amount for which the barcode was generated.",
                    "step3": "Provide cash to complete your payment.",
                    "step4": "Keep your receipt as proof of payment."
                  }
                ]
              }
            ],
            "name": "Family Dollar",
            "fields": [],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [],
            "payment_options": [],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          }
        ]
      },
      {
        "category": "bank",
        "order": 2,
        "types": [
          {
            "type": "us_ach_bank",
            "mapping": null,
            "order": 0,
            "image": "https://iconslib.rapyd.net/checkout/us_ach_bank.png",
            "instructions": {
              "name": "instructions",
              "steps": [
                {
                  "step1": "Provide your routing and account number to process the transaction"
                },
                {
                  "step2": "Once completed, the transaction will take approximately 2-3 days to process"
                }
              ]
            },
            "name": "ACH Debit",
            "fields": [
              {
                "name": "proof_of_authorization",
                "type": "boolean",
                "regex": null,
                "description": "Indicates that the requester has received authorization from the payor.",
                "is_required": true,
                "is_updatable": false
              },
              {
                "name": "first_name",
                "type": "string",
                "regex": null,
                "description": "First name of the payor. Required for individual",
                "is_required": false,
                "is_updatable": false
              },
              {
                "name": "last_name",
                "type": "string",
                "regex": null,
                "description": "Last name of the payor. Required for individual",
                "is_required": false,
                "is_updatable": false
              },
              {
                "name": "company_name",
                "type": "string",
                "regex": null,
                "description": "Company name, when the payor is a business organization. Required for company",
                "is_required": false,
                "is_updatable": false
              },
              {
                "name": "routing_number",
                "type": "number",
                "regex": "^([0-9]){9,9}$",
                "description": "Bank routing number (9 digits)",
                "is_required": true,
                "is_updatable": false
              },
              {
                "name": "payment_purpose",
                "type": "string",
                "regex": ".{1,10}",
                "description": "Purpose of the payment",
                "is_required": true,
                "is_updatable": false
              },
              {
                "name": "account_number",
                "type": "number",
                "regex": "^([0-9]){1,34}$",
                "description": "The payer's bank account number (up to 34 digits long)",
                "is_required": true,
                "is_updatable": false
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [],
            "payment_options": [],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          },
          {
            "type": "us_sameday_ach_bank",
            "mapping": null,
            "order": 1,
            "image": "https://iconslib.rapyd.net/checkout/us_sameday_ach_bank.png",
            "instructions": [
              {
                "name": "instructions",
                "steps": [
                  {
                    "step1": "Payments received and processed before 4:00PM EST will be credited within the same day"
                  }
                ]
              }
            ],
            "name": "Same day US ACH debit",
            "fields": [
              {
                "name": "first_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,50}$",
                "is_required": false
              },
              {
                "name": "last_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,50}$",
                "is_required": false
              },
              {
                "name": "company_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,100}$",
                "is_required": false
              },
              {
                "name": "account_type",
                "regex": "CHECKING|SAVING",
                "is_required": true
              },
              {
                "name": "account_number",
                "type": "number",
                "regex": "^([0-9]){3,20}$",
                "is_required": true
              },
              {
                "name": "routing_number",
                "type": "number",
                "regex": "^([0-9]){9}$",
                "is_required": true
              },
              {
                "name": "proof_of_authorization",
                "type": "boolean",
                "is_required": true
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [],
            "payment_options": [],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          },
          {
            "type": "us_standard_ach_bank",
            "mapping": null,
            "order": 2,
            "image": "https://iconslib.rapyd.net/checkout/us_standard_ach_bank.png",
            "instructions": [
              {
                "name": "instructions",
                "steps": [
                  {
                    "step1": "Payments received and processed before 6:45PM EST will be credited within the next day"
                  }
                ]
              }
            ],
            "name": "US ACH debit",
            "fields": [
              {
                "name": "first_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,50}$",
                "is_required": false
              },
              {
                "name": "last_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,50}$",
                "is_required": false
              },
              {
                "name": "company_name",
                "type": "string",
                "regex": "^([A-Za-z]){3,100}$",
                "is_required": false
              },
              {
                "name": "account_type",
                "regex": "CHECKING|SAVING",
                "is_required": true
              },
              {
                "name": "account_number",
                "type": "number",
                "regex": "^([0-9]){3,20}$",
                "is_required": true
              },
              {
                "name": "routing_number",
                "type": "number",
                "regex": "^([0-9]){9}$",
                "is_required": true
              },
              {
                "name": "proof_of_authorization",
                "type": "boolean",
                "is_required": true
              }
            ],
            "supported_currencies": [
              "USD"
            ],
            "payment_method_options": [],
            "payment_options": [],
            "supported_digital_wallet_providers": [],
            "min_amount": null,
            "max_amount": null,
            "authorization_flow": false,
            "is_conditional": false,
            "is_redirect": false
          }
        ]
      }
    ]
  }
}

```


## Example 4
### payouts - via this call you can send apyment to any other bank

POST// https://sandboxapi.rapyd.net/v1/payouts

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be not empty for POST call
     */

 $data = [
            'method' => 'post',
            'path' => '/v1/checkout/v1/payouts',
            'body'=>[
                "beneficiary" => [
                    "payment_type"=> "regular",
                    "address"=> "1 Main Street",
                    "city"=> "Anytown",
                    "country"=> "US",
                    "first_name"=> "Henry",
                    "last_name"=> "Tan",
                    "state"=> "NY",
                    "postcode"=> "10101",
                    "aba"=> "573675777",
                    "account_number"=> "77711020345678"
                ],
                "beneficiary_country"=> "US",
                "beneficiary_entity_type"=> "individual",
                "description"=> "des c15622888",
                "payout_method_type"=> "us_general_bank",
                "ewallet"=> "ewallet_************",
                "metadata"=> [
                    "merchant_defined"=> true
                ],
                "payout_amount"=> "1.00",
                "payout_currency"=> "USD",
                "sender"=> [
                    "first_name"=> "John",
                    "last_name"=> "Doe",
                    "identification_type"=> "work_permit",
                    "identification_value"=> "6584133",
                    "phone_number"=> "621212938122",
                    "occupation"=> "plumber",
                    "source_of_income"=> "business",
                    "date_of_birth"=> "11/12/1913",
                    "state"=> "anytown",
                    "postcode"=> "10101",
                    "city"=> "anytown",
                    "address"=> "1 Main Street",
                    "purpose_code"=> "investment_income",
                    "beneficiary_relationship"=> "client"
                ],
                "sender_country"=> "US",
                "sender_currency"=> "USD",
                "sender_entity_type"=> "individual",
            ],
            ],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```Response

    **Response**

    {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "0b7591ae-43fa-46da-b13c-7245bbd7875d"
  },
  "data": {
    "id": "payout_fa596d28fbbf1a7d93546e02926df8a3",
    "payout_type": "bank",
    "payout_method_type": "us_general_bank",
    "amount": 1,
    "payout_currency": "USD",
    "sender_amount": 1,
    "sender_currency": "USD",
    "status": "Created",
    "sender_country": "US",
    "sender": {
      "id": "sender_25dab8e9c78be2f8d5daf31f8081aa51",
      "last_name": "Doe",
      "first_name": "John",
      "country": "US",
      "entity_type": "individual",
      "address": "1 Main Street",
      "name": "John Doe",
      "date_of_birth": "11/12/1913",
      "postcode": "10101",
      "city": "anytown",
      "state": "anytown",
      "phone_number": "621212938122",
      "currency": "USD",
      "identification_type": "work_permit",
      "identification_value": "6584133",
      "purpose_code": "investment_income",
      "beneficiary_relationship": "client",
      "source_of_income": "business",
      "occupation": "plumber"
    },
    "beneficiary_country": "US",
    "beneficiary": {
      "id": "beneficiary_ca34fef92a357194f55783fab03080cc",
      "last_name": "Tan",
      "first_name": "Henry",
      "country": "US",
      "entity_type": "individual",
      "address": "1 Main Street",
      "name": "Henry Tan",
      "postcode": "10101",
      "city": "Anytown",
      "state": "NY",
      "account_number": "77711020345678",
      "currency": "USD",
      "aba": "573675777",
      "payment_type": "regular"
    },
    "fx_rate": 1,
    "instructions": [
      {
        "name": "instructions",
        "steps": [
          {
            "step1": "The funds will be transferred to the provided account details of the beneficiary ."
          }
        ]
      }
    ],
    "ewallets": [
      {
        "ewallet_id": "ewallet_42206f08ea0fde58dcf584e9aa79330d",
        "amount": 1,
        "percent": 100
      }
    ],
    "metadata": {
      "merchant_defined": true
    },
    "description": "des c15622888",
    "created_at": 1669013662,
    "payout_fees": null,
    "expiration": null,
    "paid_at": null,
    "identifier_type": null,
    "identifier_value": null,
    "error": null,
    "paid_amount": 0,
    "statement_descriptor": null,
    "gc_error_code": null
  }
}

```

## Example 5
### Payout Complete - Payout Complete - once you sent a payout it goes to the pending and admin need to change the status payout but through this call, you can auto-change the status from pending to complete

POST// https://sandboxapi.rapyd.net/v1/payouts/complete/payout_****************

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be empty for this POST call
     */

 $data = [
            'method' => 'post',
            'path' => '/v1/payouts/complete/payout_fa596d28fbbf1a7d93546e02926df8a3',
            'body'=>[],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```response

    **Response**

    {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "93e85f7e-f211-4e23-a1eb-a74c9d379150"
  },
  "data": {
    "id": "payout_fa596d28fbbf1a7d93546e02926df8a3",
    "payout_type": "bank",
    "payout_method_type": "us_general_bank",
    "amount": 1,
    "payout_currency": "USD",
    "sender_amount": 1,
    "sender_currency": "USD",
    "status": "Completed",
    "sender_country": "US",
    "sender": {
      "id": "sender_5b8afaf26bc5ce0a5c62a8ffd253ea78",
      "last_name": "Doe",
      "first_name": "John",
      "country": "US",
      "entity_type": "individual",
      "address": "1 Main Street",
      "name": "John Doe",
      "date_of_birth": "11/12/1913",
      "postcode": "10101",
      "city": "anytown",
      "state": "anytown",
      "phone_number": "621212938122",
      "currency": "USD",
      "identification_type": "work_permit",
      "identification_value": "6584133",
      "purpose_code": "investment_income",
      "beneficiary_relationship": "client",
      "source_of_income": "business",
      "occupation": "plumber"
    },
    "beneficiary_country": "US",
    "beneficiary": {
      "id": "beneficiary_b2b1b71c04f15a0958aae76a08dc643f",
      "last_name": "Tan",
      "first_name": "Henry",
      "country": "US",
      "entity_type": "individual",
      "address": "1 Main Street",
      "name": "Henry Tan",
      "postcode": "10101",
      "city": "Anytown",
      "state": "NY",
      "currency": "USD",
      "payment_type": "regular"
    },
    "fx_rate": 1,
    "instructions": [
      {
        "name": "instructions",
        "steps": [
          {
            "step1": "The funds will be transferred to the provided account details of the beneficiary ."
          }
        ]
      }
    ],
    "instructions_value": {},
    "ewallets": [
      {
        "ewallet_id": "ewallet_**************",
        "amount": 1,
        "percent": 100
      }
    ],
    "metadata": {
      "merchant_defined": true
    },
    "description": "des c15622888",
    "created_at": 1669014612,
    "payout_fees": null,
    "expiration": null,
    "merchant_reference_id": null,
    "paid_at": "1669014630",
    "identifier_type": null,
    "identifier_value": null,
    "error": null,
    "paid_amount": 1,
    "statement_descriptor": null,
    "gc_error_code": null
  }
}

```


## Example 6
### Fund Transfer - transfer funds from rapyd account to wallet

POST// https://sandboxapi.rapyd.net/v1/account/deposit

```php
// namespace
use skrpm\rapyd\Controller\SkRapydController;

Data reqiured
- path
- method
- body

/**
     * instead of  $data variable you can use any name and pass this array to the function as mentioned in Example
     *
     * path variable name should be the same as given
     * method variable name should be the same as given
     * body variable name should be the same as given
     * Body will be not empty for POST call
     *
     * add your wallet where you want to send funds
     */

 $data = [
            'method' => 'post',
            'path' => '/v1/account/deposit',
            'body'=>[
                 'ewallet' => 'ewallet_**************

                'amount' => '1000',
                'currency' => 'USD',
                'metadata' => [
                    'merchant_defined' => true
                ],
        ];

        $rapyd = (new SkRapydController())->skRapydResponse($data);
        return json_encode($rapyd);
```

```response

    **Response**

    {
  "status": {
    "error_code": "",
    "status": "SUCCESS",
    "message": "",
    "response_code": "",
    "operation_id": "6c4d73d8-d967-4922-af51-a75b6ac60d3f"
  },
  "data": {
    "id": "22d30ac1-dcd3-4cae-9d0e-96c4105d8157",
    "account_id": "0578aa4b-ebcf-4b24-9802-e947bc065013",
    "phone_number": null,
    "amount": 1000,
    "currency": "USD",
    "balance_type": "available_balance",
    "balance": 406039.62,
    "metadata": {
      "merchant_defined": true
    }
  }
}

```
## Documentation

Using the same method you can call any rapyd api function , just need to add correct body method and path

[Documentation](https://docs.rapyd.net/build-with-rapyd/docs)


## Used By

This project is used by the following companies:

- Edenspell technologies
- karobarplus.com
- digital arms


## Authors

- [@Sharjeelkhokhar](https://github.com/Sharjeel122/)
- [Sharjeelkhokhar94@gmail.com]


## 🔗 Links
[![facebook](https://img.shields.io/badge/facebook-000?style=for-the-badge&logo=facebook&logoColor=white)](https://www.facebook.com/arise.sharjeel)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/sharjeel-khokhar-0a173b154/)
