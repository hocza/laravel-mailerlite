![MailerLite](http://demo.hocza.com/github/laravel-mailerlite/laravel-mailerlite.png)
# Laravel <3 MailerLite
A Laravel 5+ wrapper package for MailerLite API

Installation
---
```shell
composer require "hocza/laravel-mailerlite:2.*"
```

Add the following settings to the config/app.php

Service provider:

```php
'providers' => [
	...
	'Hocza\MailerLite\PackageServiceProvider',
]
```

For the `MailerLite::` facade

```php
'aliases' => [
	...
	'MailerLite' => 'Hocza\MailerLite\Facades\MailerLite',
]
```

Configuration
---
Just put `MAILERLITE_API_KEY=` into your .env file

On the other hand you can always publish that really small config with

php artisan vendor:publish --provider="Hocza\MailerLite\PackageServiceProvider"

If you would like to be nice
---
Register with this link if you do not already have an account with MailerLite:

<a href="http://www.mailerlite.com/a/hem25t3imq"><img border="0" title="MailerLite Email Marketing for Small Business" alt="MailerLite Email Marketing for Small Business" src="http://affiliate.mailerlite.com/images/banners/mailerlite750x100.gif" width="750" height="100" /></a>

Or you can still buy me a coffee :)
---
paypal at hocza.com
