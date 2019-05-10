<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 09/05/2019
 * Time: 14:26
 */

namespace App\Controller\User;

use App\Entity\Tags;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TagsTransformer implements DataTransformerInterface
{

    private $manager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->manager = $objectManager;
    }

    public function transform($tags)
    {
        return implode(',', $tags);
        //return implode(',',$value);
    }

    public function reverseTransform($tags)
    {
        /*
        $names=array_filter(array_unique(array_map('trim',explode(',',$value))));
        $plodTags=$this->
        $tags=[];
        foreach ($names as $name){
            $tag=new Tags();
            $tag->setName($name);
            $tags[]=$tag;
        }
        return$tags;
*/
        /*
        $tagCollection=new ArrayCollection();
        $tagsRepository=$this->manager->getRepository('Tags');
        foreach ($tags as $tag) {

            $tagInRepo = $tagsRepository->findOneByName($tag->getCenterInterest());

            if ($tagInRepo !== null) {
                // Add tag from repository if found
                $tagCollection->add($tagInRepo);
            }
            else {
                // Otherwise add new tag
                $tagCollection->add($tag);
            }
        }

        return $tagCollection;
        */
        $names = array_unique(array_filter(array_map('trim', explode(',', $string))));
        $tags = $this->manager->getRepository('TagBundle:Tag')->findBy([
            'name' => $names
        ]);
        $newNames = array_diff($names, $tags);
        foreach ($newNames as $name) {
            $tag = new Tags();
            $tag->setCenterInterest($name);
            $tags[] = $tag;
        }
        return $tags;
    }
}