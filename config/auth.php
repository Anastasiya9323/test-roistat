<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults'         => [
        'guard'     => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards'           => [
        'web' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers'        => [
        'users' => [
            'driver' => 'eloquent',
            'model'  => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords'        => [
        'users' => [
            'provider' => 'users',
            'table'    => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

    'access_token'     => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFiYjI1NTZjMmU1NzgzMDAxMDBkMjRhYTRlZGE3MTljZjliMWIwZjIzYTgwMTZmY2ExZjc4MGUzYmEwYjg3ZWRhZjg3NzY1YzRiZDJhY2M1In0.eyJhdWQiOiIwMzFhODM2ZC1lOTEwLTRhNDctODY5Yy1jMTI4ZTEyM2IzMDMiLCJqdGkiOiJhYmIyNTU2YzJlNTc4MzAwMTAwZDI0YWE0ZWRhNzE5Y2Y5YjFiMGYyM2E4MDE2ZmNhMWY3ODBlM2JhMGI4N2VkYWY4Nzc2NWM0YmQyYWNjNSIsImlhdCI6MTc1MzM4NzQwMiwibmJmIjoxNzUzMzg3NDAyLCJleHAiOjE5MTEwODE2MDAsInN1YiI6IjEyNzgyODU0IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMyNTY3ODU0LCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiZTI4NzVhOGYtMjU3Yy00NDJhLThlZjUtYWJmNGRiZGJkMjUzIiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.ru_Kv-yixAajNB7_fTME49hKdEnBFntT-WQ-v60RXx_0RCo9EtowSZIUr1Zmx1BHl5t6QF5wXnnFwfyKMQXxzNE-gvj1uC2OoPKVP8bRhOmWqkEiQrLJMBHCF-6Mx83fS2sbORE1LEMujUmdlXkAhGPiPbWZ0J4Dn6FMdLs8VCotihcCFDnlbud-plCGr-n1Sin-iZ2vl2JrWAhViQDgfKWfINYJLt5J8ucF4zGY_OOfAPSVAzSHeYQ56DT4EVlHZ2CoiC5q0YYtALAR1gTzBOK7T_ObNZElxzvKjxwIFdFekmpF7egki0ivnerBpohOXaIaqOf1zW3hNIUkNLyMww',
    'base_domain'      => 'nastya9323.amocrm.ru',
];
