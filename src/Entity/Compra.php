<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compra
 *
 * @ORM\Table(name="COMPRA", uniqueConstraints={@ORM\UniqueConstraint(name="id_compra_UNIQUE", columns={"id_compra"})}, indexes={@ORM\Index(name="fk_USUARIO_has_LIBRO_LIBRO1_idx", columns={"isbn"}), @ORM\Index(name="fk_USUARIO_has_LIBRO_USUARIO1_idx", columns={"uuid"})})
 * @ORM\Entity
 */
class Compra
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_compra", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompra;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_compra", type="date", nullable=true)
     */
    private $fechaCompra;

    /**
     * @var int
     *
     * @ORM\Column(name="Cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion_envio", type="string", length=255, nullable=false)
     */
    private $direccionEnvio;

    /**
     * @var \Libro
     *
     * @ORM\ManyToOne(targetEntity="Libro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="isbn", referencedColumnName="isbn")
     * })
     */
    private $isbn;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uuid", referencedColumnName="uuid")
     * })
     */
    private $uuid;

    public function getIdCompra(): ?int
    {
        return $this->idCompra;
    }

    public function getFechaCompra(): ?\DateTimeInterface
    {
        return $this->fechaCompra;
    }

    public function setFechaCompra(?\DateTimeInterface $fechaCompra): self
    {
        $this->fechaCompra = $fechaCompra;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getDireccionEnvio(): ?string
    {
        return $this->direccionEnvio;
    }

    public function setDireccionEnvio(string $direccionEnvio): self
    {
        $this->direccionEnvio = $direccionEnvio;

        return $this;
    }

    public function getIsbn(): ?Libro
    {
        return $this->isbn;
    }

    public function setIsbn(?Libro $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getUuid(): ?Usuario
    {
        return $this->uuid;
    }

    public function setUuid(?Usuario $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }


}
