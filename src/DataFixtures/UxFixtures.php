<?php

namespace App\DataFixtures;

use App\Entity\ComponentUx;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UxFixtures extends Fixture
{
    public const CATEGORY_UX = [
        'Autocomplete',
        'ChartJs',
        'CropperJs',
        'Dropzone',
        'Lazy-image',
        'Live-component',
        'Notify',
        'React',
        'Swup',
        'Turbo',
        'Twig-component',
        'Typed',
        'Vue',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORY_UX as $uxName) {
            $componentUx = new ComponentUx();
            $componentUx->setName($uxName);
            $this->addReference('component_' . $uxName, $componentUx);
            $manager->persist($componentUx);
        };

        $manager->flush();
    }
}
