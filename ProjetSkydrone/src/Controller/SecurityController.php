<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Exception\LogicException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription",name="security_registration")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     * @throws LogicException
     */
    public function registration(Request $request,EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
    {
        $users = new Users();
        $form = $this->createForm(RegistrationType::class, $users);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $hash= $encoder->encodePassword($users,$users->getPassword());
            $users->setPassword($hash);
            $manager->persist($users);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     *
     * @Route ("/connexion",name="security_login")
     */
    public function login()
    {
        return$this->render('security/login.html.twig');
    }

    /**
     * @Route("/deconnexion",name="security_logout")
     */
    public function  logout(){}
}

