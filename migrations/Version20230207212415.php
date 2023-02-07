<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207212415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, mobile1 VARCHAR(255) DEFAULT NULL, mobile2 VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, joining_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', designation VARCHAR(255) DEFAULT NULL, vorname VARCHAR(255) DEFAULT NULL, birthday DATE DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE user');
    }
}
