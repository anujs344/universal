<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
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

    'google' => [
        'client_id' => '158417700642-586qq25r2atv31m5h2lg73nb8ai1f4a0.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ], 

      'facebook' => [
        'client_id' => '738165184155486',
        'client_secret' => 'afc2fb373ee874641997fa0d5fe283fa',
        'redirect' => 'http://127.0.0.1:8000/facebookcallback',
    ],
];
