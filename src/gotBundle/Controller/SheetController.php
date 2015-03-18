<?php

namespace gotBundle\Controller;

use gotBundle\Entity\Sheet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SheetController extends Controller
{
        public function addAction(Request $request)
        {
            
            $Sheet = new Sheet();
            
            
            
            
            $form = $this->createFormBuilder($Sheet)
                ->add('name', 'text', array('label' => 'Nom'))
                ->add('age', 'choice',
                        array('choices' => 
                            array('Enfant' => 'Enfant',
                                'Adolescent' => 'Adolescent'
                                ),
                            'label' => 'Age')
                        )
                ->add('houseid', 'entity', array('class' => 'omgBundle:House', 'property' => 'title', 'label' => 'Maison'))
                ->add('description', 'textarea', array('label' => 'Description'))
                ->add('skills', 'entity', array('class' => 'omgBundle:Skill', 'property' => 'name', 'label' => 'Skills','expanded'=>true, 'multiple' => true))
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Sheet);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Sheet:add.html.twig', array('form' => $form->createView()));

        }
        public function getAction($id_sheet)
        {
            $Sheet = $this->getDoctrine()
                    ->getRepository('omgBundle:Sheet')
                    ->find($id_sheet);
            if (!$Sheet){
                throw $this->createNotFoundException('pas de sheet trouvé avec l\'id:'.$id_sheet);
            }            
            
            return $this->render('omgBundle:Sheet:get.html.twig', array('sheet' => $Sheet));
        }
        public function getlistAction()
        {
        
            $em = $this->getDoctrine()
                                 //->getmanager()?
                    ->getRepository('omgBundle:Sheet');
            
            $sheets = $em->findAll();
            
            return $this->render('omgBundle:Sheet:getlist.html.twig', array('sheets' => $sheets));
                
        }
        public function updateAction($id_sheet, Request $request)
        {
            
            $Sheet = $this->getDoctrine()
                    ->getRepository('omgBundle:Sheet')
                    ->find($id_sheet);
            if (!$Sheet){
                throw $this->createNotFoundException('pas de sheet trouvé avec l\'id:'.$id_sheet);
            } 
            
            $form = $this->createFormBuilder($Sheet)
                ->add('Title', 'text')
                ->add('Catchphrase', 'text')
                ->add('Heraldry', 'text')
                ->add('Description', 'text')
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Sheet);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Sheet:add.html.twig', array('form' => $form->createView()));
        }
        public function deleteAction($id_sheet, Request $request)
        {
            
            $em = $this->getDoctrine()->getManager();
            $Sheet = $em->getRepository('omgBundle:Sheet')->find($id_sheet);
            
            if (!$Sheet)
            {
                throw $this->createNotFoundException('pas de sheet trouvé avec l\'id:'.$id_sheet);
            }
            
            $form = $this->createFormBuilder($Sheet)
                ->add('effacer', 'submit')
                ->add('annuler', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                
                if ($form->get('annuler')->isClicked()) {
                    return $this->getlistAction();
                }
                
                
                $em = $this->getDoctrine()->getManager();
                $em->remove($Sheet);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Sheet:delete.html.twig', array('form' => $form->createView(), 'sheet' => $Sheet));
            
        }
}
