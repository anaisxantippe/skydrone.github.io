<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;

use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Users
 *
 * @ORM\Table(name="Users")
 * @ORM\Entity
 */

class Users implements UserInterface

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
     * @Assert\NotBlank
     * @Assert\Length(min=10, max=60, minMessage="Format de role invalide")
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+"
     * )
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
     * @Assert\NotBlank
     * @Assert\Length(min=6, max=20, minMessage="Doit faire entre 8 et 15 caractères, avec majuscule, minuscule, chiffre et caractère spécial")
     * @Assert\Regex (
     *     pattern      ="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/",
     *     htmlPattern  ="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})"
     *)
     */
    private $password;

    /**
     * @Assert\EqualTo (propertyPath="password", message="Votre mot de passe doit être identique")
     *
     */
    public $confirm_pass;
  
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(min=5, max=60, minMessage="Format d'identifiant invalide")
     * @Assert\Regex(
     *     pattern     = "/^[a-zA-Z0-9]+$/",
     *     htmlPattern = "[a-zA-Z0-9]+"
     * )
     */
    private $username;
  
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     *@Assert\Regex(
     *     pattern     = "/^([\w\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i",
     *     htmlPattern = "([\w\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})"
     * )
     *
     */
    private $mail;


    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getConfirmPass()
    {
        return $this->confirm_pass;
    }

    public function setPassword(string $password): self
    {
        $this->password= $password;

        return $this;
    }



    public function __toString()  {
        return $this->username;
    }
  
    public function getUsername(): ?string
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

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
       return $this->mail = $mail;

    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
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
