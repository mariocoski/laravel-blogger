<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Articles render type
    |--------------------------------------------------------------------------
    |
    | You can specify how would you like to display your articles
    |
    | Supported: "single", "multiple"
    |
    */
    'articles_render_type' => "single",

    /*
    |--------------------------------------------------------------------------
    | Search engine
    |--------------------------------------------------------------------------
    |
    | You can specify whether your support search
    |
    | Supported: "ElasticSearch", "TNTSearch"
    |
    */
    'search_engine' => [
      'enabled' => true,
      'provider' => 'ElasticSearch'
    ],

    /*
    |--------------------------------------------------------------------------
    | Multilingual
    |--------------------------------------------------------------------------
    |
    | You can specify whether your support multilingual website
    |
    | Supported: true, false
    |
    */
    'multilingual' => true,


    /*
    |--------------------------------------------------------------------------
    | Social login
    |--------------------------------------------------------------------------
    |
    | You can specify whether your support social logins
    |
    |
    */
    'social_login' => [
        'enabled' => true,
        'providers' => [
            'facebook' => [
                'enabled' => true,
                'redirect_url' => '',
            ],
            'twitter' => [
                'enabled' => true,
                'redirect_url' => '',
            ],
            'google' => [
                'enabled' => true,
                'redirect_url' => '',
            ],
        ],

    ],
    'github_repository' => "https://github.com/mariocoski/blogger",


];
