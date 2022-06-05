<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Usuario::class);
    }
    public function save(Usuario $usuario): void
    {
        $this->_em->persist($usuario);
        $this->_em->flush();
    }
}