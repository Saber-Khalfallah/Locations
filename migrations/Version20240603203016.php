<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603203016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_A7E8EB9D728C65E3');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_A7E8EB9D68DB9E5F');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_A7E8EB9D728C65E3 FOREIGN KEY (NumApp) REFERENCES appartement (num_app) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_A7E8EB9D68DB9E5F FOREIGN KEY (IdLoc) REFERENCES locataire (id_loc) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartement CHANGE IdProp IdProp INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement CHANGE IdProp IdProp INT NOT NULL');
        $this->addSql('ALTER TABLE Location DROP FOREIGN KEY FK_A7E8EB9D68DB9E5F');
        $this->addSql('ALTER TABLE Location DROP FOREIGN KEY FK_A7E8EB9D728C65E3');
        $this->addSql('ALTER TABLE Location ADD CONSTRAINT FK_A7E8EB9D68DB9E5F FOREIGN KEY (IdLoc) REFERENCES locataire (id_loc)');
        $this->addSql('ALTER TABLE Location ADD CONSTRAINT FK_A7E8EB9D728C65E3 FOREIGN KEY (NumApp) REFERENCES appartement (num_app)');
    }
}
