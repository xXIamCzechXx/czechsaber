<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621222717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournaments_scores ADD tournament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournaments_scores ADD CONSTRAINT FK_3BB55CCE33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournaments (id)');
        $this->addSql('CREATE INDEX IDX_3BB55CCE33D1A3E7 ON tournaments_scores (tournament_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournaments_scores DROP FOREIGN KEY FK_3BB55CCE33D1A3E7');
        $this->addSql('DROP INDEX IDX_3BB55CCE33D1A3E7 ON tournaments_scores');
        $this->addSql('ALTER TABLE tournaments_scores DROP tournament_id');
    }
}
