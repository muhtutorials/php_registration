<?php


namespace App;


class Flash
{
    const INFO = 'info';
    const WARNING = 'warning';
    const DANGER = 'danger';

    public static function addMessage($message, $type = 'success')
    {
        if (!isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }
        $_SESSION['flash_notifications'][] = ['text' => $message, 'type' => $type];
    }

    public static function getMessages()
    {
        if (isset($_SESSION['flash_notifications'])) {
            $messages =  $_SESSION['flash_notifications'];
            unset($_SESSION['flash_notifications']);
            return $messages;
        }
    }
}