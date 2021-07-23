<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723091820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advertisement ADD brand_id INT NOT NULL, ADD fueltype_id INT NOT NULL, ADD garage_id INT NOT NULL');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEE44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEEA1681B9 FOREIGN KEY (fueltype_id) REFERENCES fueltype (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEEC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_C95F6AEE44F5D008 ON advertisement (brand_id)');
        $this->addSql('CREATE INDEX IDX_C95F6AEEA1681B9 ON advertisement (fueltype_id)');
        $this->addSql('CREATE INDEX IDX_C95F6AEEC4FFF555 ON advertisement (garage_id)');
        $this->addSql('ALTER TABLE images ADD advertisement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA1FBF71B FOREIGN KEY (advertisement_id) REFERENCES advertisement (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AA1FBF71B ON images (advertisement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEE44F5D008');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEEA1681B9');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEEC4FFF555');
        $this->addSql('DROP INDEX IDX_C95F6AEE44F5D008 ON advertisement');
        $this->addSql('DROP INDEX IDX_C95F6AEEA1681B9 ON advertisement');
        $this->addSql('DROP INDEX IDX_C95F6AEEC4FFF555 ON advertisement');
        $this->addSql('ALTER TABLE advertisement DROP brand_id, DROP fueltype_id, DROP garage_id');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA1FBF71B');
        $this->addSql('DROP INDEX IDX_E01FBE6AA1FBF71B ON images');
        $this->addSql('ALTER TABLE images DROP advertisement_id');
    }
}
