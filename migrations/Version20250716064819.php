<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250716064819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC277BCCF31A FOREIGN KEY (sneakers_id) REFERENCES sneakers (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC277BCCF31A ON produit (sneakers_id)');
        $this->addSql('ALTER TABLE streetwear ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE streetwear ADD CONSTRAINT FK_4A323265F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_4A323265F347EFB ON streetwear (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC277BCCF31A');
        $this->addSql('DROP INDEX IDX_29A5EC277BCCF31A ON produit');
        $this->addSql('ALTER TABLE streetwear DROP FOREIGN KEY FK_4A323265F347EFB');
        $this->addSql('DROP INDEX IDX_4A323265F347EFB ON streetwear');
        $this->addSql('ALTER TABLE streetwear DROP produit_id');
    }
}
