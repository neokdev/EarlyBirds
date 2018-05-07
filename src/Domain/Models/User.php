<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $googleId;

    /**
     * @var string
     */
    private $facebookId;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string|null
     */
    private $salt;

    /**
     * @var Roles
     */
    private $roles;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var bool
     */
    private $isAccountNonExpired;

    /**
     * @var bool
     */
    private $isAccountNonLocked;

    /**
     * @var bool
     */
    private $isCredentialsNonExpired;

    /**
     * @var array
     */
    private $validatedObserve;

    /**
     * @var int
     */
    private $score;

    /**
     * @var level
     */
    private $level;

    /**
     * @var Badge
     */
    private $badge;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGoogleId(): string
    {
        return $this->googleId;
    }

    /**
     * @param string $googleId
     */
    public function setGoogleId(string $googleId): void
    {
        $this->googleId = $googleId;
    }

    /**
     * @return string
     */
    public function getFacebookId(): string
    {
        return $this->facebookId;
    }

    /**
     * @param string $facebookId
     */
    public function setFacebookId(string $facebookId): void
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return null|string
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @param null|string $salt
     */
    public function setSalt(?string $salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return Roles
     */
    public function getRoles(): Roles
    {
        return $this->roles;
    }

    /**
     * @param Roles $roles
     */
    public function setRoles(Roles $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isActive = $isEnabled;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->isActive,
        ]);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->isActive,
            ) = unserialize($serialized);
    }

    /**
     * @return bool
     */
    public function isAccountNonExpired(): bool
    {
        return true;
    }

    /**
     * @param bool $isAccountNonExpired
     */
    public function setIsAccountNonExpired(bool $isAccountNonExpired): void
    {
        $this->isAccountNonExpired = $isAccountNonExpired;
    }

    /**
     * @return bool
     */
    public function isAccountNonLocked(): bool
    {
        return true;
    }

    /**
     * @param bool $isAccountNonLocked
     */
    public function setIsAccountNonLocked(bool $isAccountNonLocked): void
    {
        $this->isAccountNonLocked = $isAccountNonLocked;
    }

    /**
     * @return bool
     */
    public function isCredentialsNonExpired(): bool
    {
        return true;
    }

    /**
     * @param bool $isCredentialsNonExpired
     */
    public function setIsCredentialsNonExpired(bool $isCredentialsNonExpired): void
    {
        $this->isCredentialsNonExpired = $isCredentialsNonExpired;
    }

    /**
     * @return array
     */
    public function getValidatedObserve(): array
    {
        return $this->validatedObserve;
    }

    /**
     * @param array $validatedObserve
     */
    public function setValidatedObserve(array $validatedObserve): void
    {
        $this->validatedObserve = $validatedObserve;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return level
     */
    public function getLevel(): level
    {
        return $this->level;
    }

    /**
     * @param level $level
     */
    public function setLevel(level $level): void
    {
        $this->level = $level;
    }

    /**
     * @return Badge
     */
    public function getBadge(): Badge
    {
        return $this->badge;
    }

    /**
     * @param Badge $badge
     */
    public function setBadge(Badge $badge): void
    {
        $this->badge = $badge;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
    }
}
