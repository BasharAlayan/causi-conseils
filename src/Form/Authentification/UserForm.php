<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 09/05/2019
 * Time: 15:24
 */

namespace App\Form\Authentification;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre Prenom ',
                'attr' => ['placeholder' => 'Entrez votre Prénom', 'class' => 'form-control',]])
            ->add('lastname', TextType::class, [
                'label' => 'Votre Nom',
                'attr' => ['placeholder' => 'Entrez votre Nom', 'class' => 'form-control',]])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['placeholder' => 'Entrez votre mot de passe', 'class' => 'form-control',]])
            ->add('confirm_password', PasswordType::class, [
                'label' => 'Confirmation du mot de passe',
                'attr' => ['placeholder' => 'confirmaez votre mot de passe', 'class' => 'form-control',]])
            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => ['placeholder' => 'Entrez votre Email', 'class' => 'form-control',]])
            ->add('availability', BirthdayType::class, [
                'label' => 'Votre disponibilité',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control',]])
            ->add('TagsCenterInterest', CollectionType::class, array(
                'entry_type' => TagType::class,
                'attr' => ['class' => 'form-control',]))
            ->add('List', ChoiceType::class, array('choices' => array(
                    'List1' => "List1",
                    'List2' => "List2",
                    'List3' => "List3",
                    'List4' => "List4"),
                    'placeholder' => 'La liste',
                    'attr' => ['class' => 'form-control',],
                    'expanded' => false,
                    'label' => 'A quoi vous voulez participer',)
            )
            ->add('metiers', TextType::class, [
                'label' => ' Vos metiers',
                'attr' => ['placeholder' => 'Entrez vos metiers', 'class' => 'form-control',]])

            ->add('file', FileType::class, [
                'label' => ' Votre CV',
                'attr' => ['placeholder' => 'Entrez votre CV', 'class' => 'form-control',]])

            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => "btn btn-primary",]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}
