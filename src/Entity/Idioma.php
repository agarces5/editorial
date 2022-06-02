<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 *
 * @ORM\Table(name="IDIOMA")
 * @ORM\Entity
 */
class Idioma
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_idioma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIdioma;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=45, nullable=false)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="iniciales", type="string", length=2, nullable=false)
     */
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


}
