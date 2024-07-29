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

    'api_url' => env('BUDGET_API', null),

    'api_token' => env('BUDGET_BASIC_AUTH_TOKEN', null)

];
