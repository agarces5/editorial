<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605120716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE COMPRA CHANGE uuid uuid CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE COMPRA ADD CONSTRAINT FK_6E39F679D17F50A6 FOREIGN KEY (uuid) REFERENCES USUARIO (uuid)');
        $this->addSql('ALTER TABLE COMPRA ADD CONSTRAINT FK_6E39F679CC1CF4E6 FOREIGN KEY (isbn) REFERENCES LIBRO (isbn)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9BDF821F8A FOREIGN KEY (id_autor) REFERENCES AUTOR (id_autor)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9B3BFFEBE1 FOREIGN KEY (id_idioma) REFERENCES IDIOMA (id_idioma)');
        $this->addSql('ALTER TABLE LIBRO ADD CONSTRAINT FK_A0CD6F9BEAC3B93A FOREIGN KEY (id_tema) REFERENCES TEMA (id_tema)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE COMPRA DROP FOREIGN KEY FK_6E39F679D17F50A6');
        $this->addSql('ALTER TABLE COMPRA DROP FOREIGN KEY FK_6E39F679CC1CF4E6');
        $this->addSql('ALTER TABLE COMPRA CHANGE uuid uuid CHAR(36) DEFAULT \'uuid()\' COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9BDF821F8A');
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9B3BFFEBE1');
        $this->addSql('ALTER TABLE LIBRO DROP FOREIGN KEY FK_A0CD6F9BEAC3B93A');
    }
}
