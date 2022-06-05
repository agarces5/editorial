<?php

namespace App\Entity;

class Compra
{
    private $idCompra;
    private $fechaCompra;
    private $cantidad;
    private $direccionEnvio;
    private $isbn;
    private $uuid;

    public function getIdCompra(): ?int
    {
        return $this->idCompra;
    }

    public function getFechaCompra(): ?\DateTimeInterface
    {
        return $this->fechaCompra;
    }

    public function setFechaCompra(?\DateTimeInterface $fechaCompra): void
    {
        $this->fechaCompra = $fechaCompra;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getDireccionEnvio(): ?string
    {
        return $this->direccionEnvio;
    }

    public function setDireccionEnvio(string $direccionEnvio): void
    {
        $this->direccionEnvio = $direccionEnvio;
    }

    public function getIsbn(): ?Libro
    {
        return $this->isbn;
    }

    public function setIsbn(?Libro $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getUuid(): ?Usuario
    {
        return $this->uuid;
    }

    public function setUuid(?Usuario $uuid): void
    {
        $this->uuid = $uuid;
    }

}
