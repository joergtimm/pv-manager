<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212021831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE einnahmen (id INT AUTO_INCREMENT NOT NULL, wirtschaftlichkeit_id INT DEFAULT NULL, bezeichnung VARCHAR(255) DEFAULT NULL, intervall INT DEFAULT NULL, beginn_jahr INT DEFAULT NULL, end_jahr INT DEFAULT NULL, beginn_monat INT DEFAULT NULL, end_monat INT DEFAULT NULL, linesare_aenderung_je_intervall DOUBLE PRECISION DEFAULT NULL, position INT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_7E61389829FA1CE (wirtschaftlichkeit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fremdkapital (id INT AUTO_INCREMENT NOT NULL, wirtschaftlichkeit_id INT DEFAULT NULL, bezeichnung VARCHAR(255) NOT NULL, betrag INT DEFAULT NULL, tilgung_beginn_jahr INT DEFAULT NULL, tilgung_beginn_monat INT DEFAULT NULL, laufzeit_monate INT DEFAULT NULL, zins DOUBLE PRECISION DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, INDEX IDX_4A48C88C29FA1CE (wirtschaftlichkeit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kosten (id INT AUTO_INCREMENT NOT NULL, wirtschaftlichkeit_id INT DEFAULT NULL, bezeichnung VARCHAR(255) NOT NULL, betrag INT DEFAULT NULL, intervall INT DEFAULT NULL, beginn_jahr INT DEFAULT NULL, end_jahr INT DEFAULT NULL, beginn_monat INT DEFAULT NULL, end_monat INT DEFAULT NULL, aenderung_je_intervall DOUBLE PRECISION DEFAULT NULL, INDEX IDX_5061A2E529FA1CE (wirtschaftlichkeit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE einnahmen ADD CONSTRAINT FK_7E61389829FA1CE FOREIGN KEY (wirtschaftlichkeit_id) REFERENCES wirtschaftlichkeiten (id)');
        $this->addSql('ALTER TABLE fremdkapital ADD CONSTRAINT FK_4A48C88C29FA1CE FOREIGN KEY (wirtschaftlichkeit_id) REFERENCES wirtschaftlichkeiten (id)');
        $this->addSql('ALTER TABLE kosten ADD CONSTRAINT FK_5061A2E529FA1CE FOREIGN KEY (wirtschaftlichkeit_id) REFERENCES wirtschaftlichkeiten (id)');
        $this->addSql('ALTER TABLE wirtschaftlichkeiten ADD gesamt_leistung INT NOT NULL, ADD strom_kwh_kwp INT NOT NULL, ADD gesamt_netto INT NOT NULL, ADD kwp_netto INT NOT NULL, ADD inbetriebnahme_jahr INT DEFAULT NULL, ADD inbetriebnahme_monat INT DEFAULT NULL, ADD kwh_einspeisung INT DEFAULT NULL, ADD einspeiseverguetung INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE einnahmen DROP FOREIGN KEY FK_7E61389829FA1CE');
        $this->addSql('ALTER TABLE fremdkapital DROP FOREIGN KEY FK_4A48C88C29FA1CE');
        $this->addSql('ALTER TABLE kosten DROP FOREIGN KEY FK_5061A2E529FA1CE');
        $this->addSql('DROP TABLE einnahmen');
        $this->addSql('DROP TABLE fremdkapital');
        $this->addSql('DROP TABLE kosten');
        $this->addSql('ALTER TABLE wirtschaftlichkeiten DROP gesamt_leistung, DROP strom_kwh_kwp, DROP gesamt_netto, DROP kwp_netto, DROP inbetriebnahme_jahr, DROP inbetriebnahme_monat, DROP kwh_einspeisung, DROP einspeiseverguetung');
    }
}
