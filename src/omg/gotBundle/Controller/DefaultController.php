<?php

namespace omg\gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('omggotBundle:Default:index.html.twig', array('name' => $name));
    }
		public function afficherAction()
		{
			$name="plop";
      return $this->render('omggotBundle:Default:afficher.html.twig', array('name' => $name));	
		}
		public function 
}
