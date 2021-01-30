<?php


namespace App\Controllers;

use App\Auth;
use App\Flash;
use Core\View;


class Profile extends Authenticated
{
    // remove duplicated code
    protected function before()
    {
        // since the parent "before" method is overridden in this child class we still
        // need to call it to restrict access to profile page to anonymous users
        parent::before();
        $this->user = Auth::getUser();
    }

    public function showAction()
    {
        View::renderTemplate('Profile/show.html', ['user' => $this->user]);
    }

    public function editAction()
    {
        View::renderTemplate('Profile/edit.html', ['user' => $this->user]);
    }

    public function updateAction()
    {
        $user = Auth::getUser();
        if ($this->user->updateProfile($_POST)) {
            Flash::addMessage('Changes saved');
            $this->redirect('/profile/show');
        } else {
            View::renderTemplate('Profile/edit.html', ['user' => $this->user, 'post' => $_POST]);
        }
    }
}