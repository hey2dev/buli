<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as FrameworkController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends FrameworkController
{
    /**
     * @Route("/login", name="login")
     * 
     * @return Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $username = $authUtils->getLastUsername();
        
        return $this->render('@App/security/login.html.twig', array(
            'username' => $username,
            'error' => $error,
        ));
    }
}