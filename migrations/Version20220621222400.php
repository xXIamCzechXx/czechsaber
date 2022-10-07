<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621222400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tournaments_scores (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, map_id INT DEFAULT NULL, score INT DEFAULT NULL, percentage DOUBLE PRECISION DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_3BB55CCEA76ED395 (user_id), INDEX IDX_3BB55CCE53C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tournaments_scores ADD CONSTRAINT FK_3BB55CCEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tournaments_scores ADD CONSTRAINT FK_3BB55CCE53C55F64 FOREIGN KEY (map_id) REFERENCES tournaments_maps (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tournaments_scores');
    }
}
