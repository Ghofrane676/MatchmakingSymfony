<?php

namespace App\DataFixtures;


use App\Entity\Users;
use App\Entity\Salon;
use App\Entity\Salonedition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\encodePassword;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        // Utilisation de Faker
        $faker = Factory::create('fr FR');

        $user = new Users();
        $user->SetEmail('admin@gmail.com');
        $user->setFirstname($faker->firstname());
        $user->setLastname($faker->lastname());
        // $user->setFile('/img/placechldr.jpg')
     
        $password = $this->encoder->encodePassword($user, 'password');
        $user ->SetPassword($password);
        $manager->persist($user);

        $salon= new Salon();
        $salon->setLibelle($faker->word())
        ->setDescription($faker->text());

        $manager->persist($salon);

        for ($i=0; $i<10; $i++) {

            $edition = new Salonedition;
            
            $edition ->setAdresse($faker->address('ariana'))
            ->setDatedebut($faker->dateTime('12/03/2021'))
            ->setDatefin($faker->dateTime('20/04/2021'))
            ->setSalonreference($faker->randomDigit())
            ;
            
            
            $manager->persist($edition);

            
         }


        $manager->flush();
    }

    
}
