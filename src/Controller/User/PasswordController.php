<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 12/05/2019
 * Time: 16:20
 */

namespace App\Controller\User;


use App\Entity\User;
use App\Form\Authentification\NewPasswordForm;
use App\Form\Authentification\VerifyEmailForm;
use Doctrine\Common\Persistence\ObjectManager;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Verify_The_Email" , name="VerifyEmail")
     */
    public function VerifyEmail(Request $request)
    {
        $listUser = $this->getDoctrine()->getRepository(User::class)->findAll();

        $form = $this->createForm(VerifyEmailForm::class);
        $form->handleRequest($request);

        $email = $form->get('email')->getData();
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();

         //   $this->addFlash('success', "Veuillez cliquer sur le lien ci-dessous");
            $this->addFlash('danger', "Ce compte n'existe pas dans notre systéme");
            return $this->render('Public/VerifyEmail.twig', array('AllUsers' => $listUser, 'emailResult' => $email, 'form' => $form->createView()));
        }
        return $this->render('Public/VerifyEmail.twig', array('AllUsers' => $listUser, 'emailResult' => $email, 'form' => $form->createView()));
    }

    /**
     * @Route("/Email_is_Correct/{slug}" , name="EmailOK")
     * @param $slug
     * @param Request $request
     * @param ObjectManager $objectManager
     * @param UserPasswordEncoderInterface $encoder
     * @param Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ChangePassword($slug, Request $request, ObjectManager $objectManager, UserPasswordEncoderInterface $encoder, Swift_Mailer $mailer)
    {
        $NewUser = new User();
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $slug]);

        $form = $this->createForm(NewPasswordForm::class, $NewUser);
        $form->handleRequest($request);
        $password = $form->get('password')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $password);
            $user->setPassword($hash);

            $objectManager->persist($user);
            $objectManager->flush();

            //$this->addFlash('success', "Le mot de passe a été modifier");

            return $this->redirectToRoute("Connexion");
        }
        return $this->render('Public/NewPassword.html.twig', array('form' => $form->createView()));

    }

}