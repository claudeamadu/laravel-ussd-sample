<?php

use App\Http\Ussd\States\Welcome;

return [

    /*
    |--------------------------------------------------------------------------
    | State Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Ussd State component classes in
    | your application.
    |
    */

    'state_namespace' => env('USSD_STATE_NS', 'App\\Http\\Ussd\\States'),

    /*
    |--------------------------------------------------------------------------
    | Action Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root namespace for Ussd Action component classes in
    | your application.
    |
    */

    'action_namespace' => env('USSD_ACTION_NS', 'App\\Http\\Ussd\\Actions'),

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    | This value sets the default store to use for the ussd record.
    | The store can be found in your cache stores config
    |
    */

    'cache_store' => env('USSD_STORE', null),


    /*
    |--------------------------------------------------------------------------
    | Time to live
    |--------------------------------------------------------------------------
    |
    | This value sets the default for how long the record values are to
    | be cached in your application when not specified.
    |
    */

    'cache_ttl' => env('USSD_TTL', null),

    /*
    |--------------------------------------------------------------------------
    | Default value
    |--------------------------------------------------------------------------
    |
    | This value return the default store value when a given cache key
    | is not found
    |
    */

    'cache_default' => env('USSD_DEFAULT_VALUE', null),

    /*
     |----------------------------------------------------------------------------
     | Initial Session
     |----------------------------------------------------------------------------
     |
     | The first state to be presented when the user dials the short code.
     | Since the config can be modified at runtime, you can use this
     | to reroute users with different roles to different states/menu
     |
     */
    'initial_session' => Welcome::class,

    /*
     |----------------------------------------------------------------------------------
     | Gateway Provider
     |----------------------------------------------------------------------------------
     |
     | Specify which Gateway Provider to use.
     | Supported Gateway Providers are `arkesel` and `africas_talking`
     |
     | Default: `arkesel`
     |
     | To support other gateway providers:
     | 1. set the following `env` variables:
     | `USSD_GATEWAY_PROVIDER`,
     | `USSD_PHONE_NUMBER`
     |
     | 2. Modify the `gatewayResponse()` to return the format expected
     | by your Gateway Provider. Read the docs of your Gateway Provider to learn more
     */

    'gateway_provider' => env('USSD_GATEWAY_PROVIDER', 'arkesel'),


    /*
     |----------------------------------------------------------------------------------
     | Service Code
     |----------------------------------------------------------------------------------
     |
     | The assigned service code(short code) to your Gateway Provider account
     | Refer to the docs of your Gateway Provider to find out how to obtain a service code
     |
     | Read the docs of your Gateway Provider to find the name of the parameter in the request
     | and set it as the `USSD_SESSION_ID` in the `env` file
     |
     */

    'service_code' => env('USSD_SERVICE_CODE', ''),

    /*
     |----------------------------------------------------------------------------------
     | Phone Number
     |----------------------------------------------------------------------------------
     |
     | The phone number that was used to dial the service code.
     | Use this to find a user in your database and perform business logic for that user
     |
     | Read the docs of your Gateway Provider to find the name of the parameter in the request
     | and set it as the `USSD_PHONE_NUMBER` in the `env` file
     |
     */

    'phone_number' => env('USSD_PHONE_NUMBER', 'msisdn'),

];
