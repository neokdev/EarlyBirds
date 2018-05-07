<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 04/05/2018
 * Time: 10:05
 */

namespace App\Security;

use App\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use RuntimeException;

class UserProvider extends EntityUserProvider
{
    /**
     * @param UserResponseInterface $response
     *
     * @return User|object|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $resourceOwnerName = $response->getResourceOwner()->getName();

        if (!isset($this->properties[$resourceOwnerName])) {
            throw new RuntimeException(sprintf("No property defined for entity for resource owner '%s'.", $resourceOwnerName));
        }

        $username = $response->getUsername();
        if (null === $user = $this->findUser([$this->properties[$resourceOwnerName] => $username])) {
            $user = new User();
            $user->setEmail($response->getEmail());
            $user->setGoogleId($username);
            $this->em->persist($user);
            $this->em->flush();

            return $user;
        }

        return $user;
    }
}
