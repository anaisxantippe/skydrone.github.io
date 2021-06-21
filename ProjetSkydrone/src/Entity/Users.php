<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users implements \Symfony\Component\Security\Core\User\UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    /**
     * @return string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Users
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=200, nullable=false)
     * @Assert\Length(min="8",minMessage="Votre message doit faire au moins 8 caractères!")
     */

    private $pass;

    /**
     * @return string
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     * @return Users
     */
    public function setPass(string $pass): self
    {
        $this->pass = $pass;
        return $this;
    }

    /**
     * @var
     * * @Assert\EqualTo(propertyPath="pass", message="Les mots de passe ne coïncident pas!" ))
     */
    public $confirm_password;

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    /**
     * @param mixed $confirm_password
     */
    public function setConfirmPassword($confirm_password):self
    {
        $this->confirm_password = $confirm_password;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Users
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     */
    private $mail;

    /**
     * @return string
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Users
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }


    public function __toString()
    {
        return $this->username;
    }

    public function getRoles()
    {
      return['ROLE_USER'];
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
