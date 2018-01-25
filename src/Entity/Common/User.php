<?php

namespace App\Entity\Common;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="common_users")
 * @ORM\Entity(repositoryClass="App\Repository\Common\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer 
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer") 
     */
    private $id;
    
    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=254) 
     */
    private $username;
    
    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=254)  
     */
    private $password;
    
    /**
     * @var string 
     * 
     * @ORM\Column(type="string", length=254)
     */
    private $email;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(type="boolean") 
     */
    private $isActive;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->isActive = true;
    }
    
    /**
     * @return integer
     */
    function getId(): int 
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    function getEmail(): string 
    {
        return $this->email;
    }

    /**
     * @return null
     */
    public function getSalt() 
    {
        return null;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    /**
     * @return void
     */
    public function eraseCredentials() 
    {
    }

        /**
     * @return boolean
     */
    function isActive(): bool
    {
        return $this->isActive;
    }
    
    /**
     * @param string $username
     * @return $this
     */
    function setUsername(string $username): User 
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    function setPassword(string $password): User 
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $email
     * @return $this
     */
    function setEmail(string $email): User 
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param boolean $isActive
     * @return $this
     */
    function setIsActive(bool $isActive): User 
    {
        $this->isActive = $isActive;
        return $this;
    }
    
    /**
     * @return string
     */
    public function serialize() 
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->isActive,
        ));
    }

    /**
     * @param string $serialized
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->isActive,
        ) = unserialize($serialized);
    }
}
