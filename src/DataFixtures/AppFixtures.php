<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder){
		$this->encoder = $encoder;
	}


    public function load(ObjectManager $manager )
    {
        $user = new User();
        $user->setUserName("admin");
        $user->setPassWord(
        	$this->encoder->encodePassword($user, "0000")
        );
        $user->setEmail("admin@gmail.com");

        $manager->persist($user);
        $manager->flush();
    }
}
