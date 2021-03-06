<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810231501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD uuid VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD title VARCHAR(255) DEFAULT NULL, ADD birtday DATETIME DEFAULT NULL, ADD gender VARCHAR(255) DEFAULT NULL, ADD notes LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP uuid, DROP email, DROP first_name, DROP last_name, DROP title, DROP birtday, DROP gender, DROP notes');
    }
}
