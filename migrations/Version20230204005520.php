<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230204005520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wirtschaftlichkeiten (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', modulanzahl INT DEFAULT NULL, modulpreis_je INT DEFAULT NULL, wr_ep INT DEFAULT NULL, wr_anzahl INT DEFAULT NULL, gestell INT DEFAULT NULL, elektro INT DEFAULT NULL, sonstiges INT DEFAULT NULL, pacht_jahr INT DEFAULT NULL, pacht_gesamt INT DEFAULT NULL, verguetung INT NOT NULL, inflation INT DEFAULT NULL, strom_preis_steigerung INT DEFAULT NULL, ek INT DEFAULT NULL, fk INT DEFAULT NULL, zinssatz INT DEFAULT NULL, INDEX IDX_4695FF5B166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wirtschaftlichkeiten ADD CONSTRAINT FK_4695FF5B166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD inbetriebnahme INT DEFAULT NULL, ADD beschreibung LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wirtschaftlichkeiten DROP FOREIGN KEY FK_4695FF5B166D1F9C');
        $this->addSql('DROP TABLE wirtschaftlichkeiten');
        $this->addSql('ALTER TABLE project DROP inbetriebnahme, DROP beschreibung');
    }
}
