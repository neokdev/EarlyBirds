<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $nickname;

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
    private $password;

    /**
     * @var string|null
     */
    private $salt;

    /**
     * @var string|null
     */
    private $resetPasswordToken;

    /**
     * @var array
     */
    private $roles;

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
     * @var string
     */
    private $img;

    /**
     * @var string
     */
    private $upvotes;

    /**
     * User constructor.
     * @param string     $email
     * @param string     $password
     * @param callable   $passwordEncoder
     * @param array|null $roles
     * @param string     $googleId
     * @param string     $nickname
     * @param string     $firstname
     * @param string     $lastname
     * @param string     $img
     */
    public function __construct(
        string $email,
        ?string $password,
        callable $passwordEncoder,
        ?array $roles,
        ?string $googleId,
        ?string $nickname,
        ?string $firstname,
        ?string $lastname,
        ?string $img
    ) {
        $this->id        = Uuid::uuid4();
        $this->email     = $email;
        $this->password  = $passwordEncoder($password, null);
        $this->roles     = $roles;
        $this->googleId  = $googleId;
        $this->nickname  = $nickname;
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->img       = $img;
    }

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
        return $this->email;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->email = $username;
    }

    /**
     * @return string
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
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
    public function getLastname(): ?string
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
     * @return null|string
     */
    public function getResetPasswordToken(): ?string
    {
        return $this->resetPasswordToken;
    }

    /**
     * @param null|string $resetPasswordToken
     */
    public function setResetPasswordToken(?string $resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles[] = $roles;
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
     * @return string
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getUpvotes(): string
    {
        return $this->upvotes;
    }

    /**
     * @param string $upvotes
     */
    public function setUpvotes(string $upvotes): void
    {
        $this->upvotes = $upvotes;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
    }
}
