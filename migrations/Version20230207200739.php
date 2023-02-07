<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207200739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dach (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, laenge1 INT DEFAULT NULL, laenge2 INT DEFAULT NULL, laenge3 INT NOT NULL, yes INT DEFAULT NULL, neigung INT DEFAULT NULL, azemut INT DEFAULT NULL, eindeckung VARCHAR(255) DEFAULT NULL, baujahr INT DEFAULT NULL, besonderheiten LONGTEXT DEFAULT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD lon DOUBLE PRECISION DEFAULT NULL, ADD thumb VARCHAR(255) DEFAULT NULL, ADD priority VARCHAR(255) DEFAULT NULL, ADD deadline DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dach');
        $this->addSql('ALTER TABLE project DROP lon, DROP thumb, DROP priority, DROP deadline');
    }
}
