<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708212039 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE action CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE arme CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE degats_base degats_base SMALLINT DEFAULT NULL, CHANGE degats_de degats_de SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_blog CHANGE image image VARCHAR(350) DEFAULT NULL');
        $this->addSql('ALTER TABLE campagne CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE classe CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE modificateur modificateur VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE competence CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etat CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur CHANGE date_inscription date_inscription DATETIME DEFAULT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL, CHANGE numero_portable numero_portable VARCHAR(10) DEFAULT NULL, CHANGE motdepasse password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE lore CHANGE fichier fichier VARCHAR(350) DEFAULT NULL');
        $this->addSql('ALTER TABLE objet CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE partie CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE duree duree TIME DEFAULT NULL, CHANGE date_fin date_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage CHANGE nom nom VARCHAR(50) DEFAULT NULL, CHANGE background background VARCHAR(255) DEFAULT NULL, CHANGE description_physique description_physique VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(350) DEFAULT NULL');
        $this->addSql('ALTER TABLE race CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE modificateur modificateur VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE id_difficulte_id id_difficulte_id INT DEFAULT NULL, CHANGE id_lore_id id_lore_id INT DEFAULT NULL, CHANGE id_campagne_id id_campagne_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE session CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date_fin date_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE statistiques CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE modificateur modificateur VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE succes CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE support_visuel CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_arme CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE univers CHANGE description description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE action CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE arme CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE degats_base degats_base SMALLINT DEFAULT NULL, CHANGE degats_de degats_de SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_blog CHANGE image image VARCHAR(350) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE campagne CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE classe CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE modificateur modificateur VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE competence CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etat CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE groupe CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE joueur CHANGE date_inscription date_inscription DATETIME DEFAULT \'current_timestamp()\', CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE numero_portable numero_portable VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password motdepasse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lore CHANGE fichier fichier VARCHAR(350) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE objet CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE partie CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE duree duree TIME DEFAULT \'NULL\', CHANGE date_fin date_fin DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE personnage CHANGE nom nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE background background VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description_physique description_physique VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(350) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE modificateur modificateur VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scenario CHANGE id_difficulte_id id_difficulte_id INT NOT NULL, CHANGE id_lore_id id_lore_id INT NOT NULL, CHANGE id_campagne_id id_campagne_id INT NOT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE duree duree TIME NOT NULL');
        $this->addSql('ALTER TABLE session CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_fin date_fin DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE statistiques CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE modificateur modificateur VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE succes CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE support_visuel CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_arme CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE univers CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
