<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'php_registration';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'igor';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '123321';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    // generated on https://randomkeygen.com/
    const SECRET_KEY = 'UsWcpgaEitoPRRglKuU2nU9QOv9xiinB';

    const MAILGUN_API_KEY = "73daeff60fb6f3ac62f2588847b29fac-07bc7b05-3b8187a6";

    const MAILGUN_DOMAIN = "sandboxb9576afea4dd4f768f700bd78cabe44f.mailgun.org";
}
