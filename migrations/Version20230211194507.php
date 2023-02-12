<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211194507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE icon_list ADD icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE icon_list ADD CONSTRAINT FK_D862A93154B9D732 FOREIGN KEY (icon_id) REFERENCES icons (id)');
        $this->addSql('CREATE INDEX IDX_D862A93154B9D732 ON icon_list (icon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE icon_list DROP FOREIGN KEY FK_D862A93154B9D732');
        $this->addSql('DROP INDEX IDX_D862A93154B9D732 ON icon_list');
        $this->addSql('ALTER TABLE icon_list DROP icon_id');
    }
}
