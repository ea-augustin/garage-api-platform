<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801165619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, street_num_add VARCHAR(255) NOT NULL, postal_code_add VARCHAR(255) NOT NULL, INDEX IDX_D4E6F818BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advertisement (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, fueltype_id INT NOT NULL, garage_id INT NOT NULL, title_adv VARCHAR(255) NOT NULL, price_adv DOUBLE PRECISION NOT NULL, description_adv LONGTEXT NOT NULL, date_adv DATE NOT NULL, mileage_adv INT NOT NULL, year INT NOT NULL, INDEX IDX_C95F6AEE44F5D008 (brand_id), INDEX IDX_C95F6AEEA1681B9 (fueltype_id), INDEX IDX_C95F6AEEC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name_brd VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name_cit VARCHAR(255) NOT NULL, region_cit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fueltype (id INT AUTO_INCREMENT NOT NULL, type_ful VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, professional_id INT NOT NULL, address_id INT DEFAULT NULL, name_gar VARCHAR(255) NOT NULL, email_gar VARCHAR(255) NOT NULL, telephone_gar VARCHAR(255) NOT NULL, INDEX IDX_9F26610BDB77003 (professional_id), INDEX IDX_9F26610BF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, advertisement_id INT DEFAULT NULL, url_img VARCHAR(255) NOT NULL, alt_img VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6AA1FBF71B (advertisement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, logo_id INT DEFAULT NULL, name_mod VARCHAR(255) NOT NULL, INDEX IDX_D79572D944F5D008 (brand_id), UNIQUE INDEX UNIQ_D79572D9F98F144A (logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, firstname VARCHAR(180) NOT NULL, lastname VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, telephone VARCHAR(180) NOT NULL, siren VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B3B573AAF85E0677 (username), UNIQUE INDEX UNIQ_B3B573AA3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEE44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEEA1681B9 FOREIGN KEY (fueltype_id) REFERENCES fueltype (id)');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEEC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BDB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA1FBF71B FOREIGN KEY (advertisement_id) REFERENCES advertisement (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9F98F144A FOREIGN KEY (logo_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE professional ADD CONSTRAINT FK_B3B573AA3DA5256D FOREIGN KEY (image_id) REFERENCES images (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BF5B7AF75');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA1FBF71B');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEE44F5D008');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F818BAC62AF');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEEA1681B9');
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEEC4FFF555');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9F98F144A');
        $this->addSql('ALTER TABLE professional DROP FOREIGN KEY FK_B3B573AA3DA5256D');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BDB77003');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE advertisement');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE fueltype');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE professional');
    }
}
