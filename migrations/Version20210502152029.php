<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502152029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE saloneditionpack');
        $this->addSql('ALTER TABLE users ADD pays VARCHAR(255) NOT NULL, ADD soci�t� VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD siteweb VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE saloneditionpack (PackReference INT AUTO_INCREMENT NOT NULL, EditionRefrence INT NOT NULL, Libelle VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, NombreParticipant INT NOT NULL, Montant NUMERIC(8, 0) NOT NULL, Description VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX FK_association12 (EditionRefrence), PRIMARY KEY(PackReference)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users DROP pays, DROP soci�t�, DROP adresse, DROP siteweb');
    }
}
