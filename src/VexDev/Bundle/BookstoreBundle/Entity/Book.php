<?php

namespace VexDev\Bundle\BookstoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book
{
    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="imgurl", type="string", length=255, nullable=true)
     */
    private $imgurl;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="pages", type="integer", nullable=true)
     */
    private $pages;

    /**
     * @var integer
     *
     * @ORM\Column(name="edition", type="integer", nullable=true)
     */
    private $edition;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Author", mappedBy="isbn")
     */
    private $aid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Category", mappedBy="isbn")
     */
    private $cid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="VexDev\Bundle\BookstoreBundle\Entity\Editor", mappedBy="isbn")
     */
    private $eid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eid = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get isbn
     *
     * @return string 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Book
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
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Book
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get imgurl
     *
     * @return string
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }

    /**
     * Set imgurl
     *
     * @param string $imgurl
     * @return Book
     */
    public function setImgurl($imgurl)
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set pages
     *
     * @param integer $pages
     * @return Book
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    
        return $this;
    }

    /**
     * Get pages
     *
     * @return integer 
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set edition
     *
     * @param integer $edition
     * @return Book
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    
        return $this;
    }

    /**
     * Get edition
     *
     * @return integer 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Add aid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Author $aid
     * @return Book
     */
    public function addAid(\VexDev\Bundle\BookstoreBundle\Entity\Author $aid)
    {
        $this->aid[] = $aid;
    
        return $this;
    }

    /**
     * Remove aid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Author $aid
     */
    public function removeAid(\VexDev\Bundle\BookstoreBundle\Entity\Author $aid)
    {
        $this->aid->removeElement($aid);
    }

    /**
     * Get aid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Add cid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Category $cid
     * @return Book
     */
    public function addCid(\VexDev\Bundle\BookstoreBundle\Entity\Category $cid)
    {
        $this->cid[] = $cid;
    
        return $this;
    }

    /**
     * Remove cid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Category $cid
     */
    public function removeCid(\VexDev\Bundle\BookstoreBundle\Entity\Category $cid)
    {
        $this->cid->removeElement($cid);
    }

    /**
     * Get cid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Add eid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Editor $eid
     * @return Book
     */
    public function addEid(\VexDev\Bundle\BookstoreBundle\Entity\Editor $eid)
    {
        $this->eid[] = $eid;
    
        return $this;
    }

    /**
     * Remove eid
     *
     * @param \VexDev\Bundle\BookstoreBundle\Entity\Editor $eid
     */
    public function removeEid(\VexDev\Bundle\BookstoreBundle\Entity\Editor $eid)
    {
        $this->eid->removeElement($eid);
    }

    /**
     * Get eid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEid()
    {
        return $this->eid;
    }
}