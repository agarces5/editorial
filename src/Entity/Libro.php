<?php

namespace App\Entity;

class Libro
{
    private int $isbn;
    private string $titulo;
    private int $edicion;
    private int $paginas;
    private int $stock;
    private string $portada;
    private string $sinopsis;
    private Autor $idAutor;
    private Tema $idTema;
    private Idioma $idIdioma;

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getEdicion(): ?int
    {
        return $this->edicion;
    }

    public function setEdicion(int $edicion): void
    {
        $this->edicion = $edicion;
    }

    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    public function setPaginas(int $paginas): void
    {
        $this->paginas = $paginas;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getIdAutor(): ?Autor
    {
        return $this->idAutor;
    }

    public function setIdAutor(?Autor $idAutor): void
    {
        $this->idAutor = $idAutor;
    }

    public function getIdTema(): ?Tema
    {
        return $this->idTema;
    }

    public function setIdTema(?Tema $idTema): void
    {
        $this->idTema = $idTema;
    }

    public function getIdIdioma(): ?Idioma
    {
        return $this->idIdioma;
    }

    public function setIdIdioma(?Idioma $idIdioma): void
    {
        $this->idIdioma = $idIdioma;
    }

}
