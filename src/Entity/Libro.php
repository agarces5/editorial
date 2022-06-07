<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Vich\Uploadable
 */
class Libro
{
    private int $isbn;
    private string $titulo;
    private int $edicion;
    private int $paginas;
    private int $stock;
    private $portada;
    /**
     * @Vich\UploadableField(mapping="portadas", fileNameProperty="portada")
     * @Assert\Valid
     * @Assert\File(
     *     maxSize="4000K",
     *     mimeTypes={
     *         "image/jpg", "image/gif", "image/jpeg", "image/png"
     *     }
     * )
     * @var File|null
     */
    private File $archivo_portada;
    private string $sinopsis;
    private DateTime $updatedAt;
    private Autor $idAutor;
    private Tema $idTema;
    private Idioma $idIdioma;

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getEdicion(): ?int
    {
        return $this->edicion;
    }

    public function setEdicion(int $edicion): void
    {
        $this->edicion = $edicion;
    }

    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    public function setPaginas(int $paginas): void
    {
        $this->paginas = $paginas;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getIdAutor(): ?Autor
    {
        return $this->idAutor;
    }

    public function setIdAutor(?Autor $idAutor): void
    {
        $this->idAutor = $idAutor;
    }

    public function getIdTema(): ?Tema
    {
        return $this->idTema;
    }

    public function setIdTema(?Tema $idTema): void
    {
        $this->idTema = $idTema;
    }

    public function getupdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setupdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getIdIdioma(): ?Idioma
    {
        return $this->idIdioma;
    }

    public function setIdIdioma(?Idioma $idIdioma): void
    {
        $this->idIdioma = $idIdioma;
    }

    public function getPortada(): ?string
    {
        return $this->portada;
    }

    public function setPortada(?string $portada): void
    {
        $this->portada = $portada;
    }

    public function getArchivoPortada(): ?File
    {
        return $this->archivo_portada;
    }

    /**
    * @param File|null $imageFile
    * @return $this
    */
    public function setArchivoPortada(?File $archivo_portada): ?self
    {
        $this->archivo_portada = $archivo_portada;
        if (null !== $archivo_portada) {
            $this->updatedAt = new \DateTime();
        }
        return $this;
    }
    
    public function getSinopsis(): ?string
    {
        return $this->sinopsis;
    }

    public function setSinopsis(?string $sinopsis): void
    {
        $this->sinopsis = $sinopsis;
    }

    public function __toString()
    {
        return $this->isbn.' - '.$this->titulo;
    }
}
