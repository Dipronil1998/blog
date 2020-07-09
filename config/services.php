<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
    'client_id' => '436612173761945',
    'client_secret' => '52db0c0c54131c0821043e86b76c7684',
    'redirect' => 'http://localhost:8080/blog1/public/login/facebook/callback',
],
    /*'google' => [
    'client_id' => '6830032166-sm0tauebqttou4faldfq5gl64iq7jj5u.apps.googleusercontent.com',
    'client_secret' => 'z7hP5X5MSOx0PGVhpC5o4U1R',
    'redirect' => 'http://localhost:8080/blog1/public/login/google/callback',
],*/

    'google' => [
    'client_id' => '524125336805-gbuucjbd2bq84fi5pp0mni4qk97nsup9.apps.googleusercontent.com',
    'client_secret' => '0njTXBFw9hhvukLhFDmLjH5t',
    'redirect' => 'http://localhost:8080/blog1/public/login/google/callback',
],

];
