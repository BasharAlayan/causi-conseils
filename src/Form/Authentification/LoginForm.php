<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 10/05/2019
 * Time: 16:12
 */

namespace App\Form\Authentification;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginForm extends AbstractType
{
    /*
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['placeholder' => 'Entrez votre mot de passe','name'=>'_password' , 'class' => 'form-control',]])
            ->add('_username', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => ['placeholder' => 'Entrez votre Email','name'=>'_username' ,'class' => 'form-control',]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
*/
    }
