<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 12/05/2019
 * Time: 16:24
 */

namespace App\Form\Authentification;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VerifyEmailForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => ['placeholder' => 'Entrez votre Email', 'class' => 'form-control',]])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['class' => "btn btn-primary",]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null
        ]);
    }
}