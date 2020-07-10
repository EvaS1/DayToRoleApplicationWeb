<?php

namespace App\DataFixtures;

use App\Entity\Joueur;
use Cassandra\Date;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class JoueurFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
       $joueur = new Joueur();
       $joueur->setEmail('boyer.antoine.pro@gmail.com');
       $joueur->setPseudo('Demo');
       $joueur->setPassword($this->encoder->encodePassword($joueur,'demo'));
       $manager->persist($joueur);
       $manager->flush();
    }
}
