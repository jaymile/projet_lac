<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Lodging;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LodgingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('local', 'fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $lodging = new lodging();
            $lodging
                ->setName($faker->company($nb = 3, $asText = true))
                ->setSelectlodging($faker->company($nb = 3, $asText = true))
                ->setPrice($faker->words($nb = 3, $asText = true))
                ->setHygiene($faker->words($nb = 3, $asText = true))
                ->setNoise($faker->words($nb = 5, $asText = true))
                ->setAtmosphere($faker->words($nb = 5, $asText = true))
                ->setConvenience($faker->words($nb = 5, $asText = true))
                ->setDemonstration($faker->words($nb = 3, $asText = true))
                ->setPartnership($faker->words($nb = 3, $asText = true))
                ->setHostbehavior($faker->words($nb = 3, $asText = true))
                ->setCoworkingspace($faker->words($nb = 2, $asText = true))
                ->setDescription($faker->sentences($nb = 3, $asText = true))
                ->setCreatedBy($faker->company($nb = 2, $asText = false));
            $manager->persist($lodging);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
