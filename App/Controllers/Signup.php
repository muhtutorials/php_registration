<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\User;


class Signup extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }

    public function create()
    {
        $user = new User($_POST);
        if ($user->save()) {
            $user->sendActivationEmail();
            $this->redirect('/signup/success');
        } else {
            View::renderTemplate('Signup/new.html', ['user' => $user]);
        }
    }

    public function successAction()
    {
        View::renderTemplate('Signup/success.html');
    }

    public function activateAction()
    {
        User::activate($this->route_params['token']);
        $this->redirect('/signup/activated');
    }

    public function activatedAction()
    {
        View::renderTemplate('Signup/activated.html');
    }
}