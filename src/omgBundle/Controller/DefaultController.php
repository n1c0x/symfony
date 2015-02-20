<?php

namespace omgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('gotBundle:Default:index.html.twig', array('name' => $name));
    }
}
