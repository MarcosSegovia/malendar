<?php

namespace Malendar\Application\Controller;

use Symfony\Component\HttpFoundation\Response;

class WelcomeController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function helloAction()
    {
        return $this->twig->render('index.html');
    }
}