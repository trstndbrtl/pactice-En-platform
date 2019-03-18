<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190313234239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE verb (id INT AUTO_INCREMENT NOT NULL, present VARCHAR(60) NOT NULL, preterit VARCHAR(60) DEFAULT NULL, participe_present VARCHAR(60) DEFAULT NULL, participe_passe VARCHAR(60) DEFAULT NULL, participe_perfect VARCHAR(60) DEFAULT NULL, type_verb VARCHAR(60) DEFAULT NULL, traduction VARCHAR(255) DEFAULT NULL, phonetique VARCHAR(255) DEFAULT NULL, irregular TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, status TINYINT(1) DEFAULT \'1\' NOT NULL, username VARCHAR(120) NOT NULL, name VARCHAR(120) DEFAULT NULL, forname VARCHAR(120) DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, portrait VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE verb');
        $this->addSql('DROP TABLE user');
    }
}
