<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220122131756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, contents LONGTEXT NOT NULL, picture LONGTEXT NOT NULL, INDEX IDX_23A0E66B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, article_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, date_publication DATE NOT NULL, INDEX IDX_9474526CB03A8386 (created_by_id), INDEX IDX_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_lodging (id INT AUTO_INCREMENT NOT NULL, lodging_id INT DEFAULT NULL, creted_by_id INT DEFAULT NULL, content LONGTEXT NOT NULL, publication_date DATE NOT NULL, INDEX IDX_7E467A3A87335AF1 (lodging_id), INDEX IDX_7E467A3A6E39655A (creted_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coworkingspace (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, internet VARCHAR(255) NOT NULL, desk VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, rule VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, atmosphere VARCHAR(255) NOT NULL, hostbehavior VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, continent VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, user_lodging_id INT DEFAULT NULL, hostel VARCHAR(255) DEFAULT NULL, airbnb VARCHAR(255) DEFAULT NULL, guesthouse VARCHAR(255) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, hygiene VARCHAR(255) NOT NULL, noise VARCHAR(255) NOT NULL, custumerbase VARCHAR(255) NOT NULL, atmosphere VARCHAR(255) NOT NULL, convenience VARCHAR(255) NOT NULL, demonstration VARCHAR(255) NOT NULL, partnership VARCHAR(255) NOT NULL, hostbehavior VARCHAR(255) NOT NULL, coworkingspace VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_8D35182A20549C1D (user_lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ref_critere (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ponderation INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_lodging_id INT DEFAULT NULL, roles JSON NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, original_country VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64920549C1D (user_lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lodging (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE comment_lodging ADD CONSTRAINT FK_7E467A3A87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE comment_lodging ADD CONSTRAINT FK_7E467A3A6E39655A FOREIGN KEY (creted_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A20549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64920549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE comment_lodging DROP FOREIGN KEY FK_7E467A3A87335AF1');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66B03A8386');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB03A8386');
        $this->addSql('ALTER TABLE comment_lodging DROP FOREIGN KEY FK_7E467A3A6E39655A');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A20549C1D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64920549C1D');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE comment_lodging');
        $this->addSql('DROP TABLE coworkingspace');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE ref_critere');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_lodging');
    }
}
