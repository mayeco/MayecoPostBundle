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

}
