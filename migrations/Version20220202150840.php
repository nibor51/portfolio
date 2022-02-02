<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202150840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work_tech (work_id INT NOT NULL, tech_id INT NOT NULL, INDEX IDX_7F7F812ABB3453DB (work_id), INDEX IDX_7F7F812A64727BFC (tech_id), PRIMARY KEY(work_id, tech_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_tech ADD CONSTRAINT FK_7F7F812ABB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_tech ADD CONSTRAINT FK_7F7F812A64727BFC FOREIGN KEY (tech_id) REFERENCES tech (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_work ADD work_id INT NOT NULL');
        $this->addSql('ALTER TABLE image_work ADD CONSTRAINT FK_A174821EBB3453DB FOREIGN KEY (work_id) REFERENCES work (id)');
        $this->addSql('CREATE INDEX IDX_A174821EBB3453DB ON image_work (work_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE work_tech');
        $this->addSql('ALTER TABLE image_work DROP FOREIGN KEY FK_A174821EBB3453DB');
        $this->addSql('DROP INDEX IDX_A174821EBB3453DB ON image_work');
        $this->addSql('ALTER TABLE image_work DROP work_id, CHANGE alt alt VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE src src VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tech CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE work CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
