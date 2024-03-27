<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240327204011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE age_modifier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payment_period_modifier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE age_modifier (id INT NOT NULL, discount_percent SMALLINT NOT NULL, discount_absolute_limit INT DEFAULT NULL, lower_age_limit SMALLINT NOT NULL, upper_age_limit SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE payment_period_modifier (id INT NOT NULL, discount_percent SMALLINT NOT NULL, discount_absolute_limit INT DEFAULT NULL, booking_start INT NOT NULL, booking_end INT DEFAULT NULL, payment_date_border INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE age_modifier_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payment_period_modifier_id_seq CASCADE');
        $this->addSql('DROP TABLE age_modifier');
        $this->addSql('DROP TABLE payment_period_modifier');
    }
}
