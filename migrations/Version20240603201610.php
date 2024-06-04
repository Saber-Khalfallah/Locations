<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603201610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Location (dat_loc DATE NOT NULL, nbr_mois INT NOT NULL, montant NUMERIC(10, 2) NOT NULL, IdLoc VARCHAR(255) NOT NULL, NumApp INT NOT NULL, INDEX IDX_A7E8EB9D68DB9E5F (IdLoc), INDEX IDX_A7E8EB9D728C65E3 (NumApp), PRIMARY KEY(IdLoc, NumApp, dat_loc)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Location ADD CONSTRAINT FK_A7E8EB9D68DB9E5F FOREIGN KEY (IdLoc) REFERENCES locataire (id_loc)');
        $this->addSql('ALTER TABLE Location ADD CONSTRAINT FK_A7E8EB9D728C65E3 FOREIGN KEY (NumApp) REFERENCES appartement (num_app)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Location DROP FOREIGN KEY FK_A7E8EB9D68DB9E5F');
        $this->addSql('ALTER TABLE Location DROP FOREIGN KEY FK_A7E8EB9D728C65E3');
        $this->addSql('DROP TABLE Location');
    }
}
