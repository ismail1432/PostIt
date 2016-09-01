<?php

namespace PostIt\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PostItUserBundle:Default:index.html.twig');
    }
}
