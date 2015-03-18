<?php

namespace gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('omgBundle:Default:index.html.twig');
    }
}
