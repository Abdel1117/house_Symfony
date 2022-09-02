<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714124445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apartement_tags (apartement_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_2EFE7F3F47FEB5FF (apartement_id), INDEX IDX_2EFE7F3F8D7B4FB4 (tags_id), PRIMARY KEY(apartement_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartement_tags ADD CONSTRAINT FK_2EFE7F3F47FEB5FF FOREIGN KEY (apartement_id) REFERENCES apartement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apartement_tags ADD CONSTRAINT FK_2EFE7F3F8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE apartement_tags');
    }
}
