<?php

namespace PostIt\AnnounceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Announce
 *
 * @ORM\Table(name="postit_announce")
 * @ORM\Entity(repositoryClass="PostIt\AnnounceBundle\Repository\AnnounceRepository")
 */
class Announce
{
    public function __construct()
    {
    // Par défaut, la date de l'annonce est la date d'aujourd'hui
    $this->date = new \Datetime();
    }

    /**
    * @ORM\ManyToOne(targetEntity="PostIt\UserBundle\Entity\User", inversedBy="announces", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

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
     * Set title
     *
     * @param string $title
     *
     * @return Announce
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Announce
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Announce
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Announce
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Announce
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Announce
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Announce
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set user
     *
     * @param \PostIt\UserBundle\Entity\User $user
     *
     * @return Announce
     */
    public function setUser(\PostIt\UserBundle\Entity\User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Get user
     *
     * @return \PostIt\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
   * @ORM\PrePersist
   */
  public function increase()
  {
    $this->getUser()->increaseAnnounce();
  }
  /**
   * @ORM\PreRemove
   */
  public function decrease()
  {
    $this->getUser()->decreaseAnnouncet();
  }
}

