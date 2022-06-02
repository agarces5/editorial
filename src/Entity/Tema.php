<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tema
 *
 * @ORM\Table(name="TEMA", uniqueConstraints={@ORM\UniqueConstraint(name="id_tema_UNIQUE", columns={"id_tema"})})
 * @ORM\Entity
 */
class Tema
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tema", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTema;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    public function getIdTema(): ?int
    {
        return $this->idTema;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


}
