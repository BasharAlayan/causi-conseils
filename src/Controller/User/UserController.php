<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\Connexion\LoginForm;
use App\Form\SignUp\UserForm;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends AbstractController
{
    /**
     * @Route("/Connection/authentification" , name="authentification")
     * @param Request $request
     * @param ObjectManager $objectManager
     * @param UserPasswordEncoderInterface $encoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function Authentication(Request $request, ObjectManager $objectManager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $user->setCreatedAt(new \DateTime());

            $objectManager->persist($user);
            $objectManager->flush();
            return $this->redirectToRoute("Connexion");
        }
        return $this->render('Public/Authentication.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/deconnexion", name="Logout")
     */
    public function Deconnexion()
    {

    }

}