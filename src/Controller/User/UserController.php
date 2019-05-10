<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\SignUp\UserForm;
use Doctrine\Common\Persistence\ObjectManager;
use http\Message;
use Swift_Mailer;
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
     * @param Swift_Mailer $maile
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function Authentication(Request $request, ObjectManager $objectManager, UserPasswordEncoderInterface $encoder,Swift_Mailer $maile)
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

            $message = (new \Swift_Message('Instructions de confirmation '))
                ->setFrom('alayanbashar@gmail.com')
                ->setTo($user->getEmail())
                ->setBody("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

            $maile->send($message);
            $this->addFlash('success',"Un message a été envoyé a votre boite mail");

            return $this->redirectToRoute("authentification");
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