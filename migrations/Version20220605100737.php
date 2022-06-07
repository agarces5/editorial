<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605100737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE AUTOR 
            (id_autor INT AUTO_INCREMENT NOT NULL, 
            nombre VARCHAR(45) DEFAULT NULL, 
            foto VARCHAR(255) DEFAULT NULL, 
            descripcion TEXT DEFAULT NULL, 
            PRIMARY KEY(id_autor)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );
        
        $this->addSql(
            'CREATE TABLE IDIOMA 
            (id_idioma INT AUTO_INCREMENT NOT NULL, 
            idioma VARCHAR(45) NOT NULL, 
            iniciales VARCHAR(2) NOT NULL, 
            PRIMARY KEY(id_idioma)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE TEMA 
            (id_tema INT AUTO_INCREMENT NOT NULL, 
            nombre VARCHAR(45) NOT NULL, 
            UNIQUE INDEX id_tema_UNIQUE (id_tema), 
            PRIMARY KEY(id_tema)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );

        $this->addSql(
            'CREATE TABLE USUARIO 
            (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', 
            nickname VARCHAR(255) NOT NULL, 
            roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', 
            nombre VARCHAR(45) NOT NULL, 
            direccion VARCHAR(255) NOT NULL, 
            telefono VARCHAR(45) NOT NULL, 
            email VARCHAR(45) NOT NULL, 
            fecha_ingreso DATETIME DEFAULT CURRENT_TIMESTAMP, 
            Password VARCHAR(255) NOT NULL, 
            estado TINYINT(1) NOT NULL, 
            UNIQUE INDEX uuid_UNIQUE (uuid), 
            PRIMARY KEY(uuid)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );
        
        $this->addSql(
            'CREATE TABLE LIBRO 
            (isbn BIGINT AUTO_INCREMENT NOT NULL, 
            id_autor INT DEFAULT NULL, 
            id_idioma INT DEFAULT NULL, 
            id_tema INT DEFAULT NULL, 
            titulo VARCHAR(100) NOT NULL, 
            edicion INT NOT NULL, 
            paginas INT NOT NULL, 
            stock INT NOT NULL, 
            portada VARCHAR(255) DEFAULT NULL, 
            sinopsis TEXT DEFAULT NULL, 
            INDEX fk_AUTOR_LIBRO (id_autor), 
            INDEX fk_TEMA_LIBRO (id_tema), 
            INDEX fk_IDIOMA_LIBRO (id_idioma), 
            UNIQUE INDEX isbn_UNIQUE (isbn), 
            PRIMARY KEY(isbn)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );
        
        $this->addSql(
            'CREATE TABLE COMPRA 
            (id_compra INT AUTO_INCREMENT NOT NULL, 
            uuid CHAR(36) DEFAULT UUID() COMMENT \'(DC2Type:uuid)\', 
            isbn BIGINT DEFAULT NULL, 
            fecha_compra DATETIME DEFAULT NULL, 
            cantidad INT NOT NULL, 
            direccion_envio VARCHAR(255) NOT NULL, 
            INDEX fk_USUARIO_compra_LIBRO (uuid), 
            INDEX fk_LIBRO_esComprado_USUARIO (isbn), 
            UNIQUE INDEX id_compra_UNIQUE (id_compra), 
            PRIMARY KEY(id_compra)) 
            DEFAULT CHARACTER SET utf8mb4 
            COLLATE `utf8mb4_unicode_ci` 
            ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE AUTOR');
        $this->addSql('DROP TABLE COMPRA');
        $this->addSql('DROP TABLE IDIOMA');
        $this->addSql('DROP TABLE LIBRO');
        $this->addSql('DROP TABLE TEMA');
        $this->addSql('DROP TABLE USUARIO');
    }
}
