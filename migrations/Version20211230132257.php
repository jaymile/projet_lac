<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211230132257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ref_critere (id INT AUTO_INCREMENT NOT NULL, user_lodging_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ponderation INT NOT NULL, UNIQUE INDEX UNIQ_BB7ED38320549C1D (user_lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lodging (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ref_critere ADD CONSTRAINT FK_BB7ED38320549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id)');
        $this->addSql('ALTER TABLE comment ADD created_by_id INT NOT NULL, ADD article_id INT DEFAULT NULL, DROP auteur');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_9474526CB03A8386 ON comment (created_by_id)');
        $this->addSql('CREATE INDEX IDX_9474526C7294869C ON comment (article_id)');
        $this->addSql('ALTER TABLE lodging ADD user_lodging_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A20549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id)');
        $this->addSql('CREATE INDEX IDX_8D35182A20549C1D ON lodging (user_lodging_id)');
        $this->addSql('ALTER TABLE user ADD user_lodging_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64920549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64920549C1D ON user (user_lodging_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A20549C1D');
        $this->addSql('ALTER TABLE ref_critere DROP FOREIGN KEY FK_BB7ED38320549C1D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64920549C1D');
        $this->addSql('DROP TABLE ref_critere');
        $this->addSql('DROP TABLE user_lodging');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB03A8386');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('DROP INDEX IDX_9474526CB03A8386 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C7294869C ON comment');
        $this->addSql('ALTER TABLE comment ADD auteur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP created_by_id, DROP article_id');
        $this->addSql('DROP INDEX IDX_8D35182A20549C1D ON lodging');
        $this->addSql('ALTER TABLE lodging DROP user_lodging_id');
        $this->addSql('DROP INDEX IDX_8D93D64920549C1D ON user');
        $this->addSql('ALTER TABLE user DROP user_lodging_id');
    }
}
