<?php

namespace omg\gotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use omg\gotBundle\Entity\Personnage;
use omg\gotBundle\Entity\Maison;
use omg\gotBundle\Entity\Experience;
use omg\gotBundle\Entity\Competence;

class PersonnageController extends Controller
{
	public function accueilAction()
	{
        $name = "accueil";
        $personnages = $this->getDoctrine()->getRepository('omggotBundle:Personnage')->findAll();
        if (!$personnages)
        {   
            throw $this->createNotFoundException('Aucun Personnage trouvé');
        }

        return $this->render('omggotBundle:Got:accueil.html.twig', array('personnages' => $personnages));
    }

    public function personnageAction($id)
    {
        $personnage = new Personnage();
        $personnage = $this->getDoctrine()->getRepository('omggotBundle:Personnage')->find($id);
        if(!$personnage)
        {   
            throw $this->createNotFoundException('Aucun Personnage trouvé');
        }
        
        return $this->render('omggotBundle:Got:fiche_perso.html.twig', array('personnage' => $personnage));
    }

	public function ajouterAction(Request $request)
	{
		# Création d'un nouvel objet personnage
	    $personnage = new Personnage();
    


		# Ajout des champs
		$form = $this->createFormBuilder($personnage)
			->add('nom','text')
			->add('description','text')
            ->add('maison','entity', array(
                'class' => 'omggotBundle:Maison',
                'property' => 'nom'))
            ->add('age', 'entity', array(
                'class' => 'omggotBundle:Experience',
                'property' => 'nom'))
            ->add('competences','entity', array(
                'class' => 'omggotBundle:Competences',
                'property' => 'nom'))
			->add('save','submit')
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
