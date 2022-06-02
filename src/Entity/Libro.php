<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libro
 *
 * @ORM\Table(name="LIBRO", uniqueConstraints={@ORM\UniqueConstraint(name="isbn_UNIQUE", columns={"isbn"})}, indexes={@ORM\Index(name="fk_LIBRO_IDIOMA1_idx", columns={"id_idioma"}), @ORM\Index(name="fk_LIBRO_AUTOR1_idx", columns={"id_autor"}), @ORM\Index(name="fk_LIBRO_TEMA_idx", columns={"id_tema"})})
 * @ORM\Entity
 */
class Libro
{
    /**
     * @var int
     *
     * @ORM\Column(name="isbn", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var int
     *
     * @ORM\Column(name="edicion", type="integer", nullable=false)
     */
    private $edicion;

    /**
     * @var int
     *
     * @ORM\Column(name="paginas", type="integer", nullable=false)
     */
    private $paginas;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var \Autor
     *
     * @ORM\ManyToOne(targetEntity="Autor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_autor", referencedColumnName="id_autor")
     * })
     */
    private $idAutor;

    /**
     * @var \Tema
     *
     * @ORM\ManyToOne(targetEntity="Tema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tema", referencedColumnName="id_tema")
     * })
     */
    private $idTema;

    /**
     * @var \Idioma
     *
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_idioma", referencedColumnName="id_idioma")
     * })
     */
    private $idIdioma;

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEdicion(): ?int
    {
        return $this->edicion;
    }

    public function setEdicion(int $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    public function setPaginas(int $paginas): self
    {
        $this->paginas = $paginas;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getIdAutor(): ?Autor
    {
        return $this->idAutor;
    }

    public function setIdAutor(?Autor $idAutor): self
    {
        $this->idAutor = $idAutor;

        return $this;
    }

    public function getIdTema(): ?Tema
    {
        return $this->idTema;
    }

    public function setIdTema(?Tema $idTema): self
    {
        $this->idTema = $idTema;

        return $this;
    }

    public function getIdIdioma(): ?Idioma
    {
        return $this->idIdioma;
    }

    public function setIdIdioma(?Idioma $idIdioma): self
    {
        $this->idIdioma = $idIdioma;

        return $this;
    }


}
