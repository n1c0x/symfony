<?php

namespace omg\gotBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function afficherAction()
    {
				$name = "test";
        return $this->render('omggotBundle:Default:afficher.html.twig', array('name' => $name));
    }
		public function ajouterAction()
		{

		}
}
