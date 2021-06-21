<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CatalogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1; $i<=30;$i++) {
            $product = new Product();
            $product->setName("Produit n°$i")
                    ->setDescription("<p>Ce drone est super !</p>")
                    ;
            $manager->persist($product);
        }

        $manager->flush();
    }
}
