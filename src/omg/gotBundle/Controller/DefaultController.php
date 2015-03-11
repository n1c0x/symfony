<?php

namespace omg\gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function acceuilAction($name)
    {
        return $this->render('omggotBundle:omggot:index.html.twig', array('name' => $name));
    }
	public function afficherAction()
	{
			$name='test';
    return $this->render('omggotBundle:Default:afficher.html.twig', array('name' => $name));

	}
}
