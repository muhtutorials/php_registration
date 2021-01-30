<?php


namespace App\Controllers;

use App\Auth;
use App\Flash;
use Core\Controller;
use Core\View;
use App\Models\User;


class Login extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Login/new.html');
    }

    public function createAction()
    {
        $user = User::authenticate($_POST['email'], $_POST['password']);

        // if "Remember me" checkbox is checked it's present in the $_POST array otherwise not
        $remember_me = isset($_POST['remember_me']);

        if ($user) {
            Auth::login($user, $remember_me);
            Flash::addMessage('Login successful');
            $this->redirect(Auth::getReturnToPage());
        } else {
            Flash::addMessage('Login unsuccessful, please try again', Flash::DANGER);
            View::renderTemplate('Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }

    public function destroyAction()
    {
        Auth::logout();
        // going to another page creates a new session
        // after previous one is destroyed by "logout" method
        $this->redirect('/login/show-logout-message');
    }

    public function showLogoutMessageAction()
    {
        Flash::addMessage('Logout successful');
        $this->redirect('/');
    }
}