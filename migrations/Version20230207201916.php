<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207201916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dach ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dach ADD CONSTRAINT FK_D1ACCF51166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_D1ACCF51166D1F9C ON dach (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dach DROP FOREIGN KEY FK_D1ACCF51166D1F9C');
        $this->addSql('DROP INDEX IDX_D1ACCF51166D1F9C ON dach');
        $this->addSql('ALTER TABLE dach DROP project_id');
    }
}
