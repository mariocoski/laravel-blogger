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
    | Supported: "ElasticSearch", "MysqlFullTextSearch"
    |
    */
    'search_engine' => [
      'enabled' => true,
      'provider' => 'ElasticSearch'
    ],


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
