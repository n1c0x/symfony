<?php

namespace omg\gotBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return new Response('<html><body>Coucou '.$name.'</body></html>');
        #return $this->render('omggotBundle:Default:index.html.twig', array('name' => $name));
    }
}
