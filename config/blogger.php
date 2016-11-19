<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blogger  Installed Version
    |--------------------------------------------------------------------------
    |
    | The version of Canvas that will be utilized in the initial installation
    | process.
    |
     */
    'version' => 'v1.0.0',

    /*
    |--------------------------------------------------------------------------
    | Articles Render Type
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
    | Pagination
    |--------------------------------------------------------------------------
    |
    |
     */
    'pagination' => [
        'articles_per_page' => 10,
    ],

    /*
    |--------------------------------------------------------------------------
    | Article layout
    |--------------------------------------------------------------------------
    |
    | Defines layout of the article
    |
     */
    'article_layout' => 'layouts.article_standard',

    /*
    |--------------------------------------------------------------------------
    | Search engine
    |--------------------------------------------------------------------------
    |
    | You can specify whether your support search
    |
    | Supported: "ElasticSearch"
    |
     */
    'search_engine' => [
        'enabled' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    |
    | You can specify your successful redirect path
    |
    |
     */
    'auth' => [
        'success' => 'dashboard',
        'impersonification' => [
            'session_name' => 'back_to_admin',
        ],
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
            ],
            'twitter' => [
                'enabled' => true,
            ],
            'google' => [
                'enabled' => true,
            ],
        ],

    ],
    'github_repository' => "https://github.com/mariocoski/laravel-blogger",

];
