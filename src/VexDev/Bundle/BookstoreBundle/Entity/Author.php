<?php

namespace VexDev\Bundle\BookstoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity
 */
class Author
{
    /**
     * @var integer
     *
     * @ORM\Column(name="aid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100, nullable=true)
     */
    private $surname;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Book", inversedBy="aid")
     * @ORM\JoinTable(name="aubo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="aid", referencedColumnName="aid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="isbn", referencedColumnName="isbn")
     *   }
     * )
     */
    private $isbn;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isbn = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get aid
     *
     * @return integer 
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Author
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Add isbn
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Book $isbn
     * @return Author
     */
    public function addIsbn(\VexDev\Bundle\BookstoreBundle\Entity\Book $isbn)
    {
        $this->isbn[] = $isbn;
    
        return $this;
    }

    /**
     * Remove isbn
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Book $isbn
     */
    public function removeIsbn(\VexDev\Bundle\BookstoreBundle\Entity\Book $isbn)
    {
        $this->isbn->removeElement($isbn);
    }

    /**
     * Get isbn
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }
}