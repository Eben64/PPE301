<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718000817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C92962BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambres (id)');
        $this->addSql('CREATE INDEX IDX_36C92962BCF5E72D ON chambres (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C92962BCF5E72D');
        $this->addSql('DROP INDEX IDX_36C92962BCF5E72D ON chambres');
        $this->addSql('ALTER TABLE chambres DROP categorie_id');
    }
}
