<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 10/05/2019
 * Time: 00:27
 */

namespace App\Controller\User;


use App\Entity\Tags;
use App\Entity\User;
use App\Form\Authentification\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends AbstractController
{
    public function new(Request $request)
    {
        $task = new User();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tags();
        $tag1->setCenterInterest('tag1');
        $task->addTagCenterInterest($tag1);
        $tag2 = new Tags();
        $tag2->setCenterInterest('tag2');
        $task->addTagCenterInterest($tag2);
        // end dummy code

        $form = $this->createForm(UserForm::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('Public/Authentication.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}