<?php
// src/PostItBundle/DataFixtures/ORM/LoadUserData.php

namespace PostItBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PostIt\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $User = new User();
        $User->setUsername('Oumar');
        $User->setPassword('Oumar');

        $User2 = new User();
        $User2->setUsername('Touati');
        $User2->setPassword('Touati');

        $User3 = new User();
        $User3->setUsername('Medireva30');
        $User2->setPassword('Medireva30');

		$manager->persist($User3);
        $manager->persist($User2);
        $manager->persist($User);
        $manager->flush();
    }
}