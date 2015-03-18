<?php

namespace gotBundle\Controller;

use gotBundle\Entity\Skill;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SkillController extends Controller
{
        public function addAction(Request $request)
        {
            
            $Skill = new Skill();
//          $Skill->setName('');
//          $Skill->setDescription('');
            
            $form = $this->createFormBuilder($Skill)
                ->add('Name', 'text')
                ->add('Description', 'text')
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Skill);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Skill:add.html.twig', array('form' => $form->createView()));

        }
        public function getAction($id_skill)
        {
            $Skill = $this->getDoctrine()
                    ->getRepository('omgBundle:Skill')
                    ->find($id_skill);
            if (!$Skill){
                throw $this->createNotFoundException('pas de skill trouvé avec l\'id:'.$id_skill);
            }            
            
            return $this->render('omgBundle:Skill:get.html.twig', array('skill' => $Skill));
        }
        public function getlistAction()
        {
        
            $em = $this->getDoctrine()
                                 //->getmanager()?
                    ->getRepository('omgBundle:Skill');
            
            $skills = $em->findAll();
            
            return $this->render('omgBundle:Skill:getlist.html.twig', array('skills' => $skills));
                
        }
        public function updateAction($id_skill, Request $request)
        {
            
            $Skill = $this->getDoctrine()
                    ->getRepository('omgBundle:Skill')
                    ->find($id_skill);
            if (!$Skill){
                throw $this->createNotFoundException('pas de skill trouvé avec l\'id:'.$id_skill);
            } 
            
            $form = $this->createFormBuilder($Skill)
                ->add('Name', 'text')
                ->add('Description', 'text')
                ->add('save', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Skill);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Skill:add.html.twig', array('form' => $form->createView()));
        }
        public function deleteAction($id_skill, Request $request)
        {
            
            $em = $this->getDoctrine()->getManager();
            $Skill = $em->getRepository('omgBundle:Skill')->find($id_skill);
            
            if (!$Skill)
            {
                throw $this->createNotFoundException('pas de skill trouvé avec l\'id:'.$id_skill);
            }
            
            $form = $this->createFormBuilder($Skill)
                ->add('effacer', 'submit')
                ->add('annuler', 'submit')
                ->getForm();
            
            $form->handleRequest($request);

            if ($form->isValid()) {
                
                if ($form->get('annuler')->isClicked()) {
                    return $this->getlistAction();
                }
                
                
                $em = $this->getDoctrine()->getManager();
                $em->remove($Skill);
                $em->flush();
                return $this->getlistAction();
            }

            return $this->render('omgBundle:Skill:delete.html.twig', array('form' => $form->createView(), 'skill' => $Skill));
            
        }
}
