<?php

namespace pdaleramirez\asymmetric\encryption;

use Illuminate\Support\Facades\Facade;

class AsymmetricEncryptionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'AsymmetricEncryption';
    }

    public static function getInstance()
    {
        return app(self::getFacadeAccessor());
    }
}
