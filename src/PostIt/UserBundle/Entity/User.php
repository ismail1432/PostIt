<?php
// src/PostIt/UserBundle/Entity/User.php
namespace PostIt\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="postit_user")
 * @ORM\Entity(repositoryClass="PostIt\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{	
  /**
   * @ORM\OneToMany(targetEntity="PostIt\AnnounceBundle\Entity\Announce", mappedBy="user", cascade={"persist", "remove"} )
   * @ORM\JoinColumn(nullable=true)
   */
  private $announces;
  
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
    
    public function __construct()
    {
        parent::__construct();     
         
        $this->roles = array('ROLE_USER');
      
         
    }
    /**
     * Add announce
     *
     * @param \PostIt\AnnounceBundle\Entity\Announce $announce
     *
     * @return User
     */
    public function addAnnounce(\PostIt\AnnounceBundle\Entity\Announce $announce)
    {
        $this->announces[] = $announce;
        return $this;
    }
    /**
     * Remove announce
     *
     * @param \PostIt\AnnounceBundle\Entity\Announce $announce
     */
    public function removeAnnounce(\PostIt\AnnounceBundle\Entity\Announce $announce)
    {
        $this->announce->removeElement($announce);
    }
    /**
     * Get announces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnounces()
    {
        return $this->announces;
    }
    /**
   * @ORM\Column(name="nb_announces", type="integer")
   */
  private $nbAnnounce = 0;
  public function increaseAnnounce()
  {
    $this->nbAnnounce++;
  }
  public function decreaseAnnounce()
  {
    $this->nbAnnounce--;
  }
  public function getnbAnnounce()
    {
        return $this->nbAnnounce;
    }
  
}