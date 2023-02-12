<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211194300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE icons DROP FOREIGN KEY FK_A6A507E9F914D9B');
        $this->addSql('DROP INDEX IDX_A6A507E9F914D9B ON icons');
        $this->addSql('ALTER TABLE icons DROP icon_list_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE icons ADD icon_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE icons ADD CONSTRAINT FK_A6A507E9F914D9B FOREIGN KEY (icon_list_id) REFERENCES icon_list (id)');
        $this->addSql('CREATE INDEX IDX_A6A507E9F914D9B ON icons (icon_list_id)');
    }
}
