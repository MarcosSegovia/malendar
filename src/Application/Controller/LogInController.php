<?php

namespace Malendar\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

class LogInController
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function helloAction()
    {
        return $this->app['twig']->render('login.html');
    }

    public function processLogin()
    {

    }
}