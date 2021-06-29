<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Users
 *
 * @ORM\Table(name="Users")
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"mail"},
 *     message= "L'email que vous avec indiqué est déjà utilisé"
 * )
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
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(min=5, max=60, minMessage="Format de role invalide")
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+"
     * )
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(min=6, max=20, minMessage="Doit faire entre 8 et 15 caractères, avec majuscule, minuscule, chiffre et caractère spécial")
     * @Assert\Regex (
     *     pattern      ="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^",
     *     htmlPattern  ="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^"
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
     * @Assert\Length(min=4, max=60, minMessage="Format d'identifiant invalide")
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
     * @Assert\Email()
     * @Assert\Regex(
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
        $this->password = $password;

        return $this;
    }


    public function getUsername(): ?string
    {
        return $this->username;
    }

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
        $this->mail = $mail;
        return $this;

    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getRoles()
    { if ($this->role == "admin")
        return ["ROLE_ADMIN"];
        if ($this->role == "client")
            return ["ROLE_USER"];
        if ($this->role == "commercial")
            return ["ROLE_COMMERCIAL"];
        if ($this->role == "fournisseur")
            return ["ROLE_FOURNISSEUR"];
        return [];
    }
    public function __toString(){
        return $this->username;
    }

}