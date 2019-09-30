<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 * @ORM\Table(name="alidndcom_contact")
 */
class AlidndContact implements \JsonSerializable
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set name
     *
     * @param mixed $name
     *
     * @return AlidndContact
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set email
     *
     * @param mixed $email
     *
     * @return AlidndContact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set subject
     *
     * @param mixed $subject
     *
     * @return AlidndContact
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }
    /**
     * Get subject
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }
    /**
     * Set message
     *
     * @param mixed $message
     *
     * @return AlidndContact
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * Get message
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * @return mixed
     */
    function jsonSerialize()
    {
        return [
            'id'    => $this->id,
            'name' => $this->name,
            'email'  => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ];
    }

}