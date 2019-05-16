<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 16/05/2019
 * Time: 13:23
 */

namespace App\Form\DataTransformer;


use App\Entity\Professions;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;

class ProfessionsTransformer implements DataTransformerInterface
{

    private $manager;

    //use the dependency injection
    public function __construct(ObjectManager $objectManager)
    {
        $this->manager = $objectManager;
    }

    public function transform($value): string
    {
        //
        return implode(',', $value);
    }


    public function reverseTransform($string): array
    {

        //array_unique permet que le tag n'exists qu'un seul fois
        //array_filter pour filtrer les tags
        //array_map pour ajouter le callback
        $names = array_unique(array_filter(array_map('trim', explode(',', $string))));

        $tags = $this->manager->getRepository(Professions::class)->findBy(
            ['professions' => $names]);

        //for know just the new words
        $newNames = array_diff($names, $tags);

        //inert the new values
        foreach ($newNames as $name) {
            $tag = new Professions();
            $tag->setProfessions($name);
            $tags[] = $tag;
        }
        return $tags;
    }
}