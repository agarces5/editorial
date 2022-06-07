<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Tema
{
    private $idTema;
    private $nombre;

    public function getIdTema(): ?int
    {
        return $this->idTema;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function __toString()
    {
        return $this->nombre;
    }

}
