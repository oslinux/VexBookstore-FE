<?php

namespace VexDev\Bundle\BookstoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editor
 *
 * @ORM\Table(name="editor")
 * @ORM\Entity
 */
class Editor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="eid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Book", inversedBy="eid")
     * @ORM\JoinTable(name="edbo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="eid", referencedColumnName="eid")
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
     * Get eid
     *
     * @return integer 
     */
    public function getEid()
    {
        return $this->eid;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Editor
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
     * @return Editor
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