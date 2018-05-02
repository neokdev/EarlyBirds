<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 27/04/2018
 * Time: 09:54
 */

namespace App\Tests\Repository;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
//    /**
//     * @var EntityManagerInterface
//     */
//    private $entityManager;
//
//    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
//    {
//        $kernel = self::bootKernel();
//
//        $this->entityManager = $kernel->getContainer()
//            ->get('doctrine')
//            ->getManager();
//    }
//
//    public function testUser()
//    {
//        $role = $this
//            ->getMockBuilder(Role::class)
//            ->setMethods(['getId'])
//            ->setMethods(['getName'])
//            ->getMock();
//        $role
//            ->method('getId')
//            ->willReturn(Uuid::uuid4());
//        $role
//            ->method('getName')
//            ->willReturn("admin");
//
//        $userEntity = new User();
//
//        $userEntity->setUsername("test");
//        $userEntity->setEmail("test@test.test");
//        $userEntity->setPassword("password");
//        $userEntity->setRole(Role::class);
//        $userEntity->setEnabled(true);
//        $userEntity->setIsAccountNonExpired(true);
//        $userEntity->setIsAccountNonLocked(true);
//        $userEntity->setIsCredentialsNonExpired(true);
//
//
//
//
//    }
}
