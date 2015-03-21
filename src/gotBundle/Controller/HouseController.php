<?php

namespace gotBundle\Controller;

use gotBundle\Entity\House;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HouseController extends Controller
{
        public function addAction(Request $request)
        {
            
            $House = new House();
            
            $form = $this->createFormBuilder($House)
                ->add('title', 'text')
                ->add('catchphrase', 'text')
                ->add('heraldry', 'text')
                ->add('description', 'textarea')                    
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($House);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:House:add.html.twig', array('form' => $form->createView()));

        }
        public function getAction($id_house)
        {
            $House = $this->getDoctrine()
                    ->getRepository('omgBundle:House')
                    ->find($id_house);
            if (!$House){
                throw $this->createNotFoundException('pas de house trouvé avec l\'id:'.$id_house);
            }            
            
            return $this->render('omgBundle:House:get.html.twig', array('house' => $House));
        }
        public function getlistAction()
        {
        
            $em = $this->getDoctrine()
                                 //->getmanager()?
                    ->getRepository('omgBundle:House');
            
            $houses = $em->findAll();
            
            return $this->render('omgBundle:House:getlist.html.twig', array('houses' => $houses));
                
        }
        public function updateAction($id_house, Request $request)
        {
            
            $House = $this->getDoctrine()
                    ->getRepository('omgBundle:House')
                    ->find($id_house);
            if (!$House){
                throw $this->createNotFoundException('pas de house trouvé avec l\'id:'.$id_house);
            } 
            
            $form = $this->createFormBuilder($House)
                ->add('title', 'text')
                ->add('catchphrase', 'text')
                ->add('heraldry', 'text')
                ->add('description', 'textarea')
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($House);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:House:add.html.twig', array('form' => $form->createView()));
        }
        public function deleteAction($id_house, Request $request)
        {
            
            $em = $this->getDoctrine()->getManager();
            $House = $em->getRepository('omgBundle:House')->find($id_house);
            
            if (!$House)
            {
                throw $this->createNotFoundException('pas de house trouvé avec l\'id:'.$id_house);
            }
            
            $form = $this->createFormBuilder($House)
                ->add('effacer', 'submit')
                ->add('annuler', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                
                if ($form->get('annuler')->isClicked()) {
                    return $this->getlistAction();
                }
                
                
                $em = $this->getDoctrine()->getManager();
                $em->remove($House);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:House:delete.html.twig', array('form' => $form->createView(), 'house' => $House));
            
        }
        

       
}
