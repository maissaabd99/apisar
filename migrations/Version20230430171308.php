<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430171308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE employe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tache_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE employe (id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(100) NOT NULL, numcompte INT NOT NULL, grade VARCHAR(20) NOT NULL, suph VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tache (id INT NOT NULL, idemploye_id INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_93872075CC1F4FA8 ON tache (idemploye_id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075CC1F4FA8 FOREIGN KEY (idemploye_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE employe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tache_id_seq CASCADE');
        $this->addSql('ALTER TABLE tache DROP CONSTRAINT FK_93872075CC1F4FA8');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE tache');
    }
}
