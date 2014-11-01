<?php

namespace Mayeco\PostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity(repositoryClass="Mayeco\PostBundle\Entity\PostRepository")
 */
class Post
{
    /**
     *
     *  @ORM\Column(name="id", type="integer")
     *  @ORM\Id
     *  @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     *  @ORM\Column(name="titulo", type="string", length=255)
     *
     *  @Assert\NotBlank()
     */
    private $titulo;

    /**
     *
     *  @ORM\Column(name="texto", type="text")
     *
     *  @Assert\NotBlank()
     */
    private $texto;

    /**
     *
     *  @ORM\Column(name="posttype", type="string", length=255)
     *
     *  @Assert\NotBlank()
     */
    private $posttype;

    /**
     *
     *  @ORM\Column(name="publicado", type="datetime")
     */
    private $publicado;

    /**
     *
     *  @ORM\OneToMany(targetEntity="Mayeco\PostBundle\Entity\Post", mappedBy="parent")
     */
    private $children;

    /**
     *
     *  @ORM\ManyToOne(targetEntity="Mayeco\PostBundle\Entity\Post", inversedBy="children")
     *  @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Post
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set posttype
     *
     * @param string $posttype
     * @return Post
     */
    public function setPosttype($posttype)
    {
        $this->posttype = $posttype;

        return $this;
    }

    /**
     * Get posttype
     *
     * @return string 
     */
    public function getPosttype()
    {
        return $this->posttype;
    }

    /**
     * Set publicado
     *
     * @param \DateTime $publicado
     * @return Post
     */
    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;

        return $this;
    }

    /**
     * Get publicado
     *
     * @return \DateTime 
     */
    public function getPublicado()
    {
        return $this->publicado;
    }

    /**
     * Add children
     *
     * @param \Mayeco\PostBundle\Entity\Post $children
     * @return Post
     */
    public function addChild(\Mayeco\PostBundle\Entity\Post $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Mayeco\PostBundle\Entity\Post $children
     */
    public function removeChild(\Mayeco\PostBundle\Entity\Post $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Mayeco\PostBundle\Entity\Post $parent
     * @return Post
     */
    public function setParent(\Mayeco\PostBundle\Entity\Post $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Mayeco\PostBundle\Entity\Post 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
