<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717234518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_chambres (id INT AUTO_INCREMENT NOT NULL, nom_categorie_chambre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambres (id INT AUTO_INCREMENT NOT NULL, motel_id INT NOT NULL, numero_chambre INT NOT NULL, libelle VARCHAR(255) NOT NULL, prix_horaire INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_36C929627AA3B57C (motel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motel (id INT AUTO_INCREMENT NOT NULL, responsable_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, emplacement VARCHAR(255) NOT NULL, INDEX IDX_CBB3D1A953C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, chambre_id INT NOT NULL, client_id INT NOT NULL, date_reservation DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, UNIQUE INDEX UNIQ_42C849559B177F54 (chambre_id), UNIQUE INDEX UNIQ_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C929627AA3B57C FOREIGN KEY (motel_id) REFERENCES motel (id)');
        $this->addSql('ALTER TABLE motel ADD CONSTRAINT FK_CBB3D1A953C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559B177F54 FOREIGN KEY (chambre_id) REFERENCES chambres (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C929627AA3B57C');
        $this->addSql('ALTER TABLE motel DROP FOREIGN KEY FK_CBB3D1A953C59D72');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559B177F54');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP TABLE categorie_chambres');
        $this->addSql('DROP TABLE chambres');
        $this->addSql('DROP TABLE motel');
        $this->addSql('DROP TABLE reservation');
    }
}
