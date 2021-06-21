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
            $hash= $encoder->encodePassword($users,$users->getPass());
            $users->setPass($hash);
            $manager->persist($users);
            $manager->flush();
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
