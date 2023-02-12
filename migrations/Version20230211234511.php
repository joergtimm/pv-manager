<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211234511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE folder ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE folder ADD CONSTRAINT FK_ECA209CD166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_ECA209CD166D1F9C ON folder (project_id)');
        $this->addSql('ALTER TABLE project ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE storage ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD slug VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE folder DROP FOREIGN KEY FK_ECA209CD166D1F9C');
        $this->addSql('DROP INDEX IDX_ECA209CD166D1F9C ON folder');
        $this->addSql('ALTER TABLE folder DROP project_id');
        $this->addSql('ALTER TABLE project DROP slug');
        $this->addSql('ALTER TABLE storage DROP slug');
        $this->addSql('ALTER TABLE user DROP slug');
    }
}
