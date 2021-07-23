<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723092616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage ADD professional_id INT NOT NULL, ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BDB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_9F26610BDB77003 ON garage (professional_id)');
        $this->addSql('CREATE INDEX IDX_9F26610BF5B7AF75 ON garage (address_id)');
        $this->addSql('ALTER TABLE professional ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professional ADD CONSTRAINT FK_B3B573AA3DA5256D FOREIGN KEY (image_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3B573AA3DA5256D ON professional (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BDB77003');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BF5B7AF75');
        $this->addSql('DROP INDEX IDX_9F26610BDB77003 ON garage');
        $this->addSql('DROP INDEX IDX_9F26610BF5B7AF75 ON garage');
        $this->addSql('ALTER TABLE garage DROP professional_id, DROP address_id');
        $this->addSql('ALTER TABLE professional DROP FOREIGN KEY FK_B3B573AA3DA5256D');
        $this->addSql('DROP INDEX UNIQ_B3B573AA3DA5256D ON professional');
        $this->addSql('ALTER TABLE professional DROP image_id');
    }
}
