<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602153421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE AUTOR (id_autor INT UNSIGNED AUTO_INCREMENT NOT NULL, nombre VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_autor)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE COMPRA (id_compra INT UNSIGNED AUTO_INCREMENT NOT NULL, isbn BIGINT UNSIGNED DEFAULT NULL, uuid VARCHAR(36) DEFAULT NULL, fecha_compra DATE DEFAULT NULL, Cantidad INT NOT NULL, Direccion_envio VARCHAR(255) NOT NULL, INDEX fk_USUARIO_has_LIBRO_LIBRO1_idx (isbn), INDEX fk_USUARIO_has_LIBRO_USUARIO1_idx (uuid), UNIQUE INDEX id_compra_UNIQUE (id_compra), PRIMARY KEY(id_compra)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IDIOMA (id_idioma INT AUTO_INCREMENT NOT NULL, idioma VARCHAR(45) NOT NULL, iniciales VARCHAR(2) NOT NULL, PRIMARY KEY(id_idioma)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE LIBRO (isbn BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, id_autor INT UNSIGNED DEFAULT NULL, id_tema INT UNSIGNED DEFAULT NULL, id_idioma INT DEFAULT NULL, titulo VARCHAR(100) NOT NULL, edicion INT NOT NULL, paginas INT NOT NULL, stock INT NOT NULL, INDEX fk_LIBRO_IDIOMA1_idx (id_idioma), INDEX fk_LIBRO_AUTOR1_idx (id_autor), INDEX fk_LIBRO_TEMA_idx (id_tema), UNIQUE INDEX isbn_UNIQUE (isbn), PRIMARY KEY(isbn)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TEMA (id_tema INT UNSIGNED AUTO_INCREMENT NOT NULL, nombre VARCHAR(45) NOT NULL, UNIQUE INDEX id_tema_UNIQUE (id_tema), PRIMARY KEY(id_tema)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE USUARIO (uuid VARCHAR(36) NOT NULL, nickname VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', nombre VARCHAR(45) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono VARCHAR(45) NOT NULL, email VARCHAR(45) NOT NULL, fecha_ingreso DATE DEFAULT CURRENT_DATE, Password VARCHAR(255) NOT NULL, estado VARCHAR(45) NOT NULL, UNIQUE INDEX uuid_UNIQUE (uuid), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE COMPRA ADD CONSTRAINT FK_6E39F679CC1CF4E6 FOREIGN KEY (isbn) REFERENCES LIBRO (isbn)');
        $this->addSql('ALTER TABLE COMPRA ADD CONSTRAINT FK_6E39F679D17F50A6 FOREIGN KEY (uuid) REFERENCES USUARIO (uuid)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9BDF821F8A FOREIGN KEY (id_autor) REFERENCES AUTOR (id_autor)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9BEAC3B93A FOREIGN KEY (id_tema) REFERENCES TEMA (id_tema)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9B3BFFEBE1 FOREIGN KEY (id_idioma) REFERENCES IDIOMA (id_idioma)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9BDF821F8A');
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9B3BFFEBE1');
        $this->addSql('ALTER TABLE COMPRA DROP FOREIGN KEY FK_6E39F679CC1CF4E6');
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9BEAC3B93A');
        $this->addSql('ALTER TABLE COMPRA DROP FOREIGN KEY FK_6E39F679D17F50A6');
        $this->addSql('DROP TABLE AUTOR');
        $this->addSql('DROP TABLE COMPRA');
        $this->addSql('DROP TABLE IDIOMA');
        $this->addSql('DROP TABLE LIBRO');
        $this->addSql('DROP TABLE TEMA');
        $this->addSql('DROP TABLE USUARIO');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
