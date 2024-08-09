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
    'api_token' => env('THIRD_PARTY_API_TOKEN', null),

    'page_template' => '
        <x-app-layout>

        <x-slot name="header">
            <div class="page-header">
                <h3 class="page-title"> Sample Page </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Home </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sample Page </li>
                    </ol>
                </nav>
            </div>
        </x-slot>

        <div class="row">
            <div class="col-lg-12">
                <x-card>
                    <x-card-body class="pt-4 pb-5 ps-4 pe-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <i> sample page </i>
                            </div>
                        </div>

                    </x-card-body>
                </x-card>
            </div>
        </div>

    </x-app-layout>
    ',

];
