<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

class Autor
{
    private int $idAutor;
    private string $nombre;
    private $foto;
    /**
     * @Vich\UploadableField(mapping="foto_autores", fileNameProperty="foto")
     * @Assert\Valid
     * @Assert\File(
     *     mimeTypes={
     *         "image/jpg", "image/gif", "image/jpeg", "image/png"
     *     }
     * )
     * @var File|null
     */
    private File $archivo_foto;
    private string $descripcion;
    private DateTime $updatedAt;

    // public function __construct($nombre)
    // {
    //     $this->nombre=$nombre;
    // }

    public function getIdAutor(): ?int
    {
        return $this->idAutor;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): void
    {
        $this->foto = $foto;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getupdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setupdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getArchivoFoto(): ?File
    {
        return $this->archivo_foto;
    }

    /**
    * @param File|null $imageFile
    * @return $this
    */
    public function setArchivoFoto(?File $archivo_foto): ?self
    {
        $this->archivo_foto = $archivo_foto;
        if (null !== $archivo_foto) {
            $this->updatedAt = new \DateTime();
        }
        return $this;
    }
    public function __toString()
    {
        return $this->nombre;
    }
}
