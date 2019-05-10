<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 08/05/2019
 * Time: 20:58
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('public/Home.html.twig');
    }
}