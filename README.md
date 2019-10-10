# Laravel-Blogger
[![Build Status](https://travis-ci.org/mariocoski/laravel-blogger.svg?branch=master)](https://travis-ci.org/mariocoski/laravel-blogger)

## Demo
<p>https://gamechanger.mariuszrajczakowski.me</p>
<p>https://withjavascript.mariuszrajczakowski.me</p>

## About

Laravel-blogger is simple, easy-to-start blog platform powered by laravel framework, heavily inspired by [Canvas](https://canvas.toddaustin.io) blogging platform.

Current technologies include:
* [Semantic UI](http://semantic-ui.com/)
* [JQuery - Lazy Load](https://www.npmjs.com/package/jquery-lazyload)
* [TinyMCE](https://www.tinymce.com/) 
* [Scout](https://github.com/laravel/scout)
* [ElasticSearch driver for full text-searching](https://github.com/ErickTamayo/laravel-scout-elastic)
* [Filemanager-Laravel](https://github.com/guillermomartinez/filemanager-laravel)
* [Laravel-Socialite](https://github.com/laravel/socialite)
* Powered by [Laravel 5](https://laravel.com).

## Installation

Server Requirements
Before you proceed make sure your server meets the following requirements:

Composer
PHP >= 7.0
PHP extensions (PDO, SQLite, OpenSSL, Mbstring, Tokenizer)
PDO compliant database (SQL / MySQL / PostgreSQL / SQLite)

1. Two ways of downloading a project
  - use github to clone a project:
    `git clone https://github.com/mariocoski/laravel-blogger`
  - use a packagist: 
    `composer create-project mariocoski/laravel-blogger`

2. Go to the root of your project and run `composer install`

3. Run `npm install` to install all front end dependencies

4. Run `gulp` to compile all the assets

5. Run `php artisan vendor:publish` to publish all vendor files

6. Make sure your storage and bootstrap have right permissions:
`sudo chmod -R 777 ./storage ./bootstrap`

7. Make sure you have an env file copied `cp .env.example .env`

8. Install Elastic Search on your server by running shell script `sh elastic.sh` or following online solutions like:
[Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-elasticsearch-on-ubuntu-16-04) 

9. Run `php artisan blogger:install` to finish up the installation

## Supporting

Laravel-blogger is an MIT-licensed open source project available for free to download. 
All contribution are welcomed!

## License

Laravel-Blogger is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Why not to try install laravel-blogger now?

* Fully featured dashboard for admin and editor

<img src="/public/images/screenshot_dashboard.png?raw=true" alt="Laravel Blogger" width="600">

* Easy to manage articles section

<img src="/public/images/screenshot_articles.png?raw=true" alt="Laravel Blogger" width="600">

* The most powerfull markdown editor - TinyMce

<img src="/public/images/screenshot_article.png?raw=true" alt="Laravel Blogger" width="600">

* Fully featured media manager allows you to upload your images

<img src="/public/images/screenshot_media_manager.png?raw=true" alt="Laravel Blogger" width="600">

* Advanced settings section helps you to control your SEO, Google Analytics and Disqus Comments

<img src="/public/images/screenshot_settings.png?raw=true" alt="Laravel Blogger" width="600">

* Amazing, blazing fast full-text searching with Elastic Search

<img src="/public/images/screenshot_search.png?raw=true" alt="Laravel Blogger" width="600">

* Responsive Layout

<img src="/public/images/screenshot_mobile.png?raw=true" alt="Laravel Blogger" width="300">
