<?php

namespace VexDev\Bundle\BookstoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Book", inversedBy="cid")
     * @ORM\JoinTable(name="cabo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cid", referencedColumnName="cid")
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
     * Get cid
     *
     * @return integer 
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Add isbn
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Book $isbn
     * @return Category
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