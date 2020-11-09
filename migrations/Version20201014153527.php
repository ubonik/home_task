<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201014153527 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE article ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('UPDATE article set created_at = NOW(), updated_at = NOW()');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE article DROP created_at, DROP updated_at');
    }
}
