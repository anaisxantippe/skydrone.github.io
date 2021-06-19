<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Users;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription",name="security_registration")
     */
    public function registration()
    {
        $users = new Users();
        $form = $this->createForm(RegistrationType::class, $users);
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
