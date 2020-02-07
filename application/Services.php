<?php
namespace App;

use NewFramework\Config\CoreServices;
use NewFramework\FormValidation;

class Services extends CoreServices
{
    /**
     * @return array
     */
    protected static function mapInstances(): array
    {
        return [];
    }

    public static function validation()
    {
        return new FormValidation();
    }
}