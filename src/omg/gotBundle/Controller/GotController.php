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
	public function ajouterAction(Request $request)
	{
		# Création d'un nouvel objet personnage
		$personnage = new Personnage();

		# Ajout des champs
		$form = $this->createFormBuilder($personnage)
			->add('nom','text')
			->add('description','text')
			#->add('maison','text')
			#->add('age','text')
			//->add('competences','text')
			->add('save','submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()){
			//$em = $this->getDoctrine()->getManager();
			//$repository_personnage = $em->getRepository('omggotBundle:Got');
			# On insère l'instance de personnage dans la liste des élements à enregistrer en base.
			# Les données ne sont pas encore écrites
			//$em->persist($personnage);

			# On confirme l'exécution de la requète
			//$em->flush;

			return $this->redirect($this->generateUrl('got_success'));
		}

		# Génération du formulaire
		return $this->render('omggotBundle:Got:ajouter.html.twig', array('form' => $form->createView()));
	}
    public function rechercherAction()
    {
		$name = "rechercher";
        return $this->render('omggotBundle:Got:rechercher.html.twig', array('name' => $name));
    }
    public function successAction()
    {
		$name = "succes";
        return $this->render('omggotBundle:Got:success.html.twig', array('name' => $name));
    }
}
