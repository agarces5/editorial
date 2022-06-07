<?php

namespace App\Entity;

class Idioma
{
    private $idIdioma;
    private $idioma;
    private $iniciales;

    public function getIdIdioma(): ?int
    {
        return $this->idIdioma;
    }

    public function getIdioma(): ?string
    {
        return $this->idioma;
    }

    public function setIdioma(string $idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    public function getIniciales(): ?string
    {
        return $this->iniciales;
    }

    public function setIniciales(string $iniciales): self
    {
        $this->iniciales = $iniciales;

        return $this;
    }

    public function __toString()
    {
        return $this->idioma;
    }
}
