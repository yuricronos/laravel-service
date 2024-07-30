<?php

return [

    'app_root' => env('APP_ROOT', ''),

    'app_url' => env('APP_URL', 'http://127.0.0.1'),

    /**
     * 
     * this is the default /livewire/update endpoint 
     * (some version of did not included the /livewire/update endpoint)
     * 
     */
    'livewire_update' => '/livewire/update',

    /**
     * third party api url and token 
     */
    'api_url' => env('THIRD_PARTY_API', null),
    'api_token' => env('THIRD_PARTY_API_TOKEN', null)

];
