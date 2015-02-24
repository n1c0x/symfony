<?php

namespace omg\gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use omg\gotBundle\Entity\Personnage;
use omg\gotBundle\Entity\Maison;
use omg\gotBundle\Entity\Experience;
use omg\gotBundle\Entity\Competence;

class GotController extends Controller
{
	public function accueilAction()
	{
		$name = "accueil";
        return $this->render('omggotBundle:Got:accueil.html.twig', array('name' => $name));
	}
	public function ajouterAction()
	{
		
	}
    public function rechercherAction()
    {
		$name = "rechercher";
        return $this->render('omggotBundle:Got:rechercher.html.twig', array('name' => $name));
    }
}
