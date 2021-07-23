<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723093656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9F98F144A FOREIGN KEY (logo_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D79572D9F98F144A ON model (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9F98F144A');
        $this->addSql('DROP INDEX UNIQ_D79572D9F98F144A ON model');
        $this->addSql('ALTER TABLE model DROP logo_id');
    }
}
