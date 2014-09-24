<?php

    /**
     * Change user settings
     */

    namespace Idno\Pages\Account {

        /**
         * Default class to serve the homepage
         */
        class Settings extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->createGatekeeper(); // Logged-in only please
                $t        = \Idno\Core\site()->template();
                $t->body  = $t->draw('account/settings');
                $t->title = 'Account settings';
                $t->drawPage();
            }

            function postContent()
            {
                $this->createGatekeeper(); // Logged-in only please
                $user     = \Idno\Core\site()->session()->currentUser();
                $name     = $this->getInput('name');
                $email    = $this->getInput('email');
                $password = trim($this->getInput('password'));
                $username = trim($this->getInput('handle'));

                if (!empty($name)) {
                    $user->setTitle($name);
                }

                if (!empty($username) && $username != $user->getHandle()) {
                    $user->setHandle($username);
                }

                if (!empty($email) && $email != $user->email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (!\Idno\Entities\User::getByEmail($email)) {
                        $user->email = $email;
                    } else {
                        \Idno\Core\site()->session()->addMessage('Someone is already using ' . $email . ' as their email address.', 'alert-error');
                    }
                }

                if (!empty($password)) {
                    $user->setPassword($password);
                }

                if ($user->save()) {
                    \Idno\Core\site()->session()->refreshSessionUser($user);
                    \Idno\Core\site()->session()->addMessage("Your details were saved.");
                }
                $this->forward($_SERVER['HTTP_REFERER']);
            }

        }

    }