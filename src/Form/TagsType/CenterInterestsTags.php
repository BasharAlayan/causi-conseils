<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 16/05/2019
 * Time: 13:31
 */

namespace App\Form\TagsType;


use App\Form\DataTransformer\CenterInterestsTranformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CenterInterestsTags extends AbstractType
{

    private $manager;

    //To inject the manager into buildForm so we need the constructor
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(new CollectionToArrayTransformer(), true)
            ->addModelTransformer(new CenterInterestsTranformer($this->manager), true);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'data-role' => 'tagsinput'
            ]
        ]);
    }

    public function getParent()
    {
        return TextType::class;
    }
}