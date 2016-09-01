<?php
// src/PostItBundle/DataFixtures/ORM/LoadAnnounceData.php

namespace PostItBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PostIt\AnnounceBundle\Entity\Announce;
use PostIt\UserBundle\Entity\User;

class LoadAnnounceData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       // $u = new User();
        //$u1 = $u->setId(1); 



        $Announce = new Announce();
        $Announce->setTitle('Agence de Communication');
        $Announce->setContent('Dine Consulting réalise le site qui correspond à vos besoins. Nous créons pour vous un site internet vitrine clé en main, avec panneau de gestion et nom de domaine ainsi qu\'hébergement inclus');
        $Announce->setCity('Noisy le grand');
        $Announce->setStreet('13 avenue jean moulin');
        $Announce->setCompany('Dine Consulting');
        $Announce->setPublished(true);
       // $Announce->setUser($u1);

        $Announce2 = new Announce();
        $Announce2->setTitle('Dragées');
        $Announce2->setContent('Bonjour je vous propose mes services de décoration de serviette dragée bonbon pour vos mariage baptême baby shower ces décoration sont fait par mes soins remis en main propre je peux etre flexible aussi pour paris ile de france et ses régions parisiennes');
        $Announce2->setCity('Limeil-Brevannes');
        $Announce2->setStreet('1 rue pasteur');
        $Announce2->setCompany('Dragi Wedding');
        $Announce2->setPublished(true);
       // $Announce2->setUser($u1);

        $Announce3 = new Announce();
        $Announce3->setTitle('Boutique en ligne');
        $Announce3->setContent('Salamoaleykoum ! Notre nouvelle collection de jilbabs et autres produits orientaux en ligne');
        $Announce3->setCity('Paris');
        $Announce3->setStreet('13 rue gabriel peri');
        $Announce3->setCompany('AfrikenOrient Shop');
        $Announce3->setPublished(true);
        //$Announce3->setUser($u1);

		$manager->persist($Announce3);
        $manager->persist($Announce2);
        $manager->persist($Announce);
        $manager->flush();
    }
}