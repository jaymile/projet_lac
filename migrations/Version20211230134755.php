<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211230134755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment_lodging (id INT AUTO_INCREMENT NOT NULL, lodging_id INT DEFAULT NULL, creted_by_id INT DEFAULT NULL, content LONGTEXT NOT NULL, publication_date DATE NOT NULL, INDEX IDX_7E467A3A87335AF1 (lodging_id), INDEX IDX_7E467A3A6E39655A (creted_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment_lodging ADD CONSTRAINT FK_7E467A3A87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE comment_lodging ADD CONSTRAINT FK_7E467A3A6E39655A FOREIGN KEY (creted_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ref_critere DROP FOREIGN KEY FK_BB7ED38320549C1D');
        $this->addSql('DROP INDEX UNIQ_BB7ED38320549C1D ON ref_critere');
        $this->addSql('ALTER TABLE ref_critere DROP user_lodging_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comment_lodging');
        $this->addSql('ALTER TABLE ref_critere ADD user_lodging_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ref_critere ADD CONSTRAINT FK_BB7ED38320549C1D FOREIGN KEY (user_lodging_id) REFERENCES user_lodging (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BB7ED38320549C1D ON ref_critere (user_lodging_id)');
    }
}
