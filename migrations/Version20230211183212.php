<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211183212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE icon_list (id INT AUTO_INCREMENT NOT NULL, class VARCHAR(255) DEFAULT NULL, glyph VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE icons ADD icon_list_id INT DEFAULT NULL, DROP icons');
        $this->addSql('ALTER TABLE icons ADD CONSTRAINT FK_A6A507E9F914D9B FOREIGN KEY (icon_list_id) REFERENCES icon_list (id)');
        $this->addSql('CREATE INDEX IDX_A6A507E9F914D9B ON icons (icon_list_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE icons DROP FOREIGN KEY FK_A6A507E9F914D9B');
        $this->addSql('DROP TABLE icon_list');
        $this->addSql('DROP INDEX IDX_A6A507E9F914D9B ON icons');
        $this->addSql('ALTER TABLE icons ADD icons LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', DROP icon_list_id');
    }
}
