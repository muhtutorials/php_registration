<?php


namespace App\Controllers;

use App\Controllers\Authenticated;
use Core\View;


class Items extends Authenticated
{
    public function indexAction()
    {
        View::renderTemplate('Items/index.html');
    }
}