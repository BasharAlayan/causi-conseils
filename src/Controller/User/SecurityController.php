<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 10/05/2019
 * Time: 13:26
 */

namespace App\Controller\User;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends AbstractController
{
    /**
     * @Route("/Connexion" , name="Connexion")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('Public/Connexion.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}