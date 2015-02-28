<?php

namespace omg\gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use omg\gotBundle\Entity\Personnage;
use omg\gotBundle\Entity\Maison;
use omg\gotBundle\Entity\Experience;
use omg\gotBundle\Entity\Competence;

class CompetencesController extends Controller
{
    public function listeAction()
    {   
        $competences = $this->getDoctrine()->getRepository('omggotBundle:Competences')->findAll();
        if(!$competences)
        {
            throw $this->createNotFoundException('Aucune Compétences trouvé');
        }

        return $this->render('omggotBundle:Got:liste_comp.html.twig', array('competences' => $competences));
    }

    public function ajouterAction()
    {
        $competence = new Competences();
    


		# Ajout des champs
		$form = $this->createFormBuilder($competence)
			->add('nom','text')
			->add('description','text')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
            
            # On insère l'instance de personnage dans la liste des élements à enregistrer en base.
			# Les données ne sont pas encore écrites
			$em->persist($personnage);

			# On confirme l'exécution de la requète
			$em->flush();

			return $this->redirect($this->generateUrl('got_success'));
		}

		# Génération du formulaire
		return $this->render('omggotBundle:Got:ajouter_comp.html.twig', array('form' => $form->createView()));

    }
}
