<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 12/05/2019
 * Time: 18:27
 */

namespace App\Form\Authentification;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewPasswordForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', PasswordType::class, [
                'label' => 'Nouveau mot de passe',
                'attr' => ['placeholder' => 'Entrez votre nouveau mot de passe', 'class' => 'form-control',]])

            ->add('confirm_password', PasswordType::class, [
                'label' => 'Confirmez le Nouveau mot de passe',
                'attr' => ['placeholder' => 'Confirmez votre nouveau mot de passe', 'class' => 'form-control',]])


            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['class' => "btn btn-primary",]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}