<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208024339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project_member (id INT AUTO_INCREMENT NOT NULL, projekt_id INT DEFAULT NULL, join_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', rolle VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, rights LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', last_action DATETIME DEFAULT NULL, INDEX IDX_67401132261D545D (projekt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_member ADD CONSTRAINT FK_67401132261D545D FOREIGN KEY (projekt_id) REFERENCES project (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project_member DROP FOREIGN KEY FK_67401132261D545D');
        $this->addSql('DROP TABLE project_member');
    }
}
