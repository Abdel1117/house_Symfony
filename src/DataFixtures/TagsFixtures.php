<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tags;


/**
 * Description of TagsFixtures
 *
 * @author abder
 */
class TagsFixtures extends Fixture  {
    
        public function load(ObjectManager $manager): void
        {
            $tags_array = [
                ["name" => "Appartement"],
                ["name" => "Maison"],
                ["name" => "Villa"],
                ["name" => "Chalêt"]                
            ];
            
            foreach($tags_array as $tags){
                $tag = new Tags();
                $tag->setTagName($tag['name']);
                $manager->persist($tag);
            }
            $manager->flush();
        }
}
