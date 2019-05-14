<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 13/05/2019
 * Time: 16:06
 */

namespace App\Controller\Tag;


use App\Entity\Tags;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;

class StringToTagsTransformer implements DataTransformerInterface
{

    private $om;

    public function __construct(ObjectManager $om)
{
    $this->om = $om;
}

    public function reverseTransform($ftags)
{
    $tags = new ArrayCollection();
    $tag = strtok($ftags, ",");
    while($tag !== false) {
        $itag = new Tags();
        $itag->setCenterInterest($tag);
        if(!$tags->contains($itag))
            $tags[] = $itag;
        $tag = strtok(",");
    }
    return $tags;
}

    public function transform($tags)
{
    $ftags = "";
    if($tags != null) {
        foreach($tags as $tag)
            $ftags = $ftags.','.$tag->getCenterInterest();

    }
    return $ftags;
}
}
