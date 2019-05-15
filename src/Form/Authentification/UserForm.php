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
use Symfony\Component\Form\Extension\Core\Type\CountryType;
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
                'attr' => ['placeholder' => 'confirmez votre mot de passe', 'class' => 'form-control',]])

            ->add('email', EmailType::class, [
                'label' => 'Votre Email',
                'attr' => ['placeholder' => 'Entrez votre Email', 'class' => 'form-control',]])

            ->add('availability', BirthdayType::class, [
                'label' => 'Votre disponibilité',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control',]])

            ->add('birth_date', BirthdayType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'form-control',]])
            ->add('nationality', CountryType::class , [
                'label' => 'Votre nationalité',
                'attr' => ['class' => 'form-control',]])

            ->add('country', CountryType::class, [
                'label' => 'Votre pays',
                'attr' => ['class' => 'form-control',]])

            ->add("TagsCenterInterest", TagType::class,[
                'label' => 'centre d\'intérêts',
                'attr' => [ 'class' => 'tag-input',
            ]])

        //    ->add("competencies", TagType::class,[
         //       'label' => 'compétences',
         //       'attr' => [ 'class' => 'tag-input',
        //       ]])

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
          //  ->add('TagProfession', TagType::class, [
           //     'label' => ' Vos metiers',
            //    'attr' => ['class' => 'tag-input',]])

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
