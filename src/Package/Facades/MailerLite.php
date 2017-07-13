<?php

namespace Hocza\MailerLite\Facades;

use Illuminate\Support\Facades\Facade;

class MailerLite extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'mailerlite'; }
}
