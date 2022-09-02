<?php

namespace App\DataFixtures;

use App\Entity\Apartement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager): void {
        $array_name = [
            "Appartement",
            "Maison",
            "Villa",
            "Challêt"
        ];
        for ($i = 1; $i < 20; $i++) {

            $product = new Apartement();
            $product->setId($i);
            $product->setName($array_name[random_int(0, 3)] . " " . $i);
            $product->setM2(random_int(10, 100));
            $product->setAdresse(random_int(1, 20) . "Rue des Fixtures");
            $product->setNumberPiece(random_int(1, 7));
            $product->setNumberChamber(random_int(1, 5));
            $product->setPrice(random_int(100000, 510000));
        }
        $manager->flush();
    }

}
