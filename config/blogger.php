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
		    | Posts Per Page
		    |--------------------------------------------------------------------------
		    |
		    | Pretty self-explanatory here. Indicate how many posts you would like
		    | to appear on each page. If you are using Disqus, specify the
		    | identifier in your .env file.
		    |
	*/
	'posts_per_page' => 10,

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
		'provider' => 'ElasticSearch',
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
	'github_repository' => "https://github.com/mariocoski/blogger",

];
