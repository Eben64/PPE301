<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710185610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_32EB52E8F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptable (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5B644367F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity_mere (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D1D45C70F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_52520D07F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom_role VARCHAR(255) NOT NULL, code_role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, creer_le DATETIME NOT NULL, creer_par VARCHAR(255) NOT NULL, modifie_le DATETIME NOT NULL, modifie_par VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_497B315EF85E0677 (username), INDEX IDX_497B315ED60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315ED60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315ED60322AC');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comptable');
        $this->addSql('DROP TABLE entity_mere');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
