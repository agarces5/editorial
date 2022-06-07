<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{
    private $uuid;
    private $nickname;
    private $roles = [];
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $fechaIngreso;
    private $password;
    private $estado;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }
    public function getNickname(): ?string
    {
        return $this->nickname;
    }
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
    public function getNombre(): ?string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function getDireccion(): ?string
    {
        return $this->direccion;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }
    public function setFechaIngreso(?\DateTimeInterface $fechaIngreso): void
    {
        $this->fechaIngreso = $fechaIngreso;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setHashedPassword(PasswordAuthenticatedUserInterface $usuario, string $plainPassword): void
    {
        $hashedPassword = $this->hasher->hashPassword($usuario, $plainPassword);
        $this->setPassword($hashedPassword);
    }
    public function getEstado(): ?string
    {
        return $this->estado;
    }
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    public function __construct()
    {
        $this->uuid = Uuid::v4()->toRfc4122() ;
        $this->roles=["ROLE_USER"];
        $this->estado=1;
        $this->fechaIngreso=new \DateTime();
    }
    public function __toString()
    {
        return $this->uuid . ' - ' . $this->nickname;
    }

    public function isEstado(): ?bool
    {
        return $this->estado;
    }
}
