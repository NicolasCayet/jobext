<?php
// src/Extia/JobextBundle/DataFixtures/ORM/LoadCategoryData.php

namespace Extia\JobextBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Extia\JobextBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager ) {

        $design = new Category();
        $design->setName('Design');

        $programming = new Category();
        $programming->setName('Programming');

        $management = new Category();
        $management->setName('Manager');

        $administrator = new Category();
        $administrator->setName('Administrator');

        $manager->persist($design);
        $manager->persist($programming);
        $manager->persist($management);
        $manager->persist($administrator);

        $manager->flush();

        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $management);
        $this->addReference('category-administrator', $administrator);

    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}