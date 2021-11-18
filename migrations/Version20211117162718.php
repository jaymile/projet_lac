<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117162718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, contents LONGTEXT NOT NULL, picture LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coworkingspace (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, internet VARCHAR(255) NOT NULL, desk VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, rule VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, atmosphere VARCHAR(255) NOT NULL, hostbehavior VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, continent VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, hostel VARCHAR(255) DEFAULT NULL, airbnb VARCHAR(255) DEFAULT NULL, guesthouse VARCHAR(255) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, hygiene VARCHAR(255) NOT NULL, noise VARCHAR(255) NOT NULL, custumerbase VARCHAR(255) NOT NULL, atmosphere VARCHAR(255) NOT NULL, convenience VARCHAR(255) NOT NULL, demonstration VARCHAR(255) NOT NULL, partnership VARCHAR(255) NOT NULL, hostbehavior VARCHAR(255) NOT NULL, coworkingspace VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, original_country VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE coworkingspace');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE user');
    }
}
