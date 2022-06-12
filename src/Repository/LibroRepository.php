<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Libro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LibroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Libro::class);
    }
    public function save(Libro $libro): void
    {
        $this->_em->persist($libro);
        $this->_em->flush();
    }
}
