<?php

namespace App\Test\Entity\User;

use App\Entity\User;
use App\Tests\Traits\AssertHasErrors;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    use AssertHasErrors;

    /**
     * getEntity
     *
     * @return User
     */
    public function getEntity(): User
    {
        return (new User)
            ->setUsername('Geoffroy')
            ->setPassword('Hum123')
            ->setEmail('geoffroy@gmail.com')
        ;
    }
    
    /**
     * testUniqueUsername
     *
     * @return void
     */
    public function testUniqueUsername(): void
    {
        $user = $this->getEntity();
        $user->setUsername("username");
        $this->assertHasErrors($user, 1);
    }

    /**
     * testLengthUsername
     * Le pseudo de l'utilisateur doit contenir au minimum 4 carctères
     *
     * @return void
     */
    public function testLengthUsername(): void
    {
        $user = $this->getEntity();
        $user->setUsername("use");
        $this->assertHasErrors($user, 1);
    }
    
    /**
     * testGoodEmail
     *
     * @return void
     */
    public function testGoodEmail(): void
    {
        $user = $this->getEntity();
        $user->setEmail("usevrpejgvep.fr");
        $this->assertHasErrors($user, 1);
    }
    
    /**
     * testGoodPassword
     * Le mot de passe doit contenir au minimum 6 caractères dont une majuscule et un chiffre
     *
     * @return void
     */
    public function testGoodPassword(): void
    {
        $user = $this->getEntity();
        $user->setPassword("usevr");
        $this->assertHasErrors($user, 1);
    }
    
    /**
     * testNotBlankUser
     *
     * @return void
     */
    public function testNotBlankUser(): void
    {
        $this->assertHasErrors(new User, 3);
    }
}