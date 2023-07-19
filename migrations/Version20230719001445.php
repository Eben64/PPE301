<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230719001445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, ventes_id INT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix_unitaire INT NOT NULL, quantite INT NOT NULL, INDEX IDX_23A0E667D9932C (ventes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventes (id INT AUTO_INCREMENT NOT NULL, gerant_id INT NOT NULL, nom_client VARCHAR(255) NOT NULL, INDEX IDX_64EC489AA500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E667D9932C FOREIGN KEY (ventes_id) REFERENCES ventes (id)');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489AA500A924 FOREIGN KEY (gerant_id) REFERENCES gerant (id)');
        $this->addSql('ALTER TABLE role CHANGE creer_par creer_par VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs CHANGE creer_par creer_par VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E667D9932C');
        $this->addSql('ALTER TABLE ventes DROP FOREIGN KEY FK_64EC489AA500A924');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE ventes');
        $this->addSql('ALTER TABLE role CHANGE creer_par creer_par VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs CHANGE creer_par creer_par VARCHAR(255) NOT NULL');
    }
}
