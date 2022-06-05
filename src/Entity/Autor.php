<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Autor
{
    private int $idAutor;
    private string $nombre;
    private string $foto;
    private string $descripcion;

    public function __construct($nombre)
    {
        $this->nombre=$nombre;
    }

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
}
