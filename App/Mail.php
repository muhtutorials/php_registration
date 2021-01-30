<?php


// E-mails are sent using "mailgun" service
// "composer require mailgun/mailgun-php kriswallsmith/buzz nyholm/psr7" installs required packages
// because it's a free version emails are only sent to authorized recipients which should be specified in account settings
namespace App;

use Mailgun\Mailgun;


class Mail
{
    public static function send($to, $subject, $text, $html)
    {
        $mgClient = Mailgun::create(Config::MAILGUN_API_KEY);
        $domain = Config::MAILGUN_DOMAIN;
        $params = [
            'from'    => 'https://myserver.com',
            'to'      => $to,
            'subject' => $subject,
            'text'    => $text,
            'html'    => $html
        ];

        # Make the call to the client.
        $mgClient->messages()->send($domain, $params);
    }
}