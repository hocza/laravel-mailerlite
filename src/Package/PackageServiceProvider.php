<?php namespace Hocza\MailerLite;

use Illuminate\Support\ServiceProvider;
use MailerLiteApi\MailerLite;

/**
 * A Laravel 5+ Mailerlite Wrapper Package
 *
 * @author: Jozsef Hocza
 */
class PackageServiceProvider extends ServiceProvider {

    protected $packageName = 'mailerlite';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/../routes.php';

        // Publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path($this->packageName.'.php'),
        ], 'config');

        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/config.php', $this->packageName);

        $this->app->bind('mailerlite', function($app) {
            return new MailerLite(config($this->packageName.'.api_key'));
        });
    }

}
