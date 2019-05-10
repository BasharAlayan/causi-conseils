<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 10/05/2019
 * Time: 10:34
 */

namespace App\Controller\InformationUser;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserProfil extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function profileUser()
    {
        $user = $this->getUser();
        $list = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('id' => $user->getId()));
        return $this->render('User/profil.html.twig', array('profils' => $list));
    }
}
{

}