<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200326111822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE article_blog (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, contenu VARCHAR(5000) NOT NULL, auteur VARCHAR(50) NOT NULL, metatitle VARCHAR(255) NOT NULL, metadescription VARCHAR(255) NOT NULL, metakeywords VARCHAR(255) NOT NULL, image VARCHAR(350) DEFAULT NULL, UNIQUE(slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_personnage (id_arme INT NOT NULL, id_personnage INT NOT NULL, INDEX IDX_BC1F42C521D9C0A (id_arme), INDEX IDX_BC1F42C55E315342 (id_personnage), PRIMARY KEY(id_arme, id_personnage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_succes (id_joueur INT NOT NULL, id_succes INT NOT NULL, INDEX IDX_5679330FA9E2D76C (id_joueur), INDEX IDX_5679330F4EF1B4AB (id_succes), PRIMARY KEY(id_joueur, id_succes)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_partie (id_joueur INT NOT NULL, id_partie INT NOT NULL, INDEX IDX_EC200FB1A9E2D76C (id_joueur), INDEX IDX_EC200FB1E075F7A4 (id_partie), PRIMARY KEY(id_joueur, id_partie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_personnage (id_joueur INT NOT NULL, id_personnage INT NOT NULL, INDEX IDX_FA4CF31A9E2D76C (id_joueur), INDEX IDX_FA4CF315E315342 (id_personnage), PRIMARY KEY(id_joueur, id_personnage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musique_type_musique (id_musique INT NOT NULL, id_type_musique INT NOT NULL, INDEX IDX_3EC161C125E254A1 (id_musique), INDEX IDX_3EC161C138E18284 (id_type_musique), PRIMARY KEY(id_musique, id_type_musique)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_etat (id_personnage INT NOT NULL, id_etat INT NOT NULL, INDEX IDX_C8A920C5E315342 (id_personnage), INDEX IDX_C8A920CD5E86FF (id_etat), PRIMARY KEY(id_personnage, id_etat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_competence (id INT AUTO_INCREMENT NOT NULL, id_personnage INT NOT NULL, id_competence INT NOT NULL, niveau SMALLINT NOT NULL, montant SMALLINT NOT NULL, INDEX IDX_F81B36AE0198227 (id_personnage), INDEX IDX_F81B36AAB5ECCCE (id_competence), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_groupe (id INT AUTO_INCREMENT NOT NULL, id_personnage INT NOT NULL, id_groupe INT NOT NULL, rang SMALLINT NOT NULL, INDEX IDX_C21F069FE0198227 (id_personnage), INDEX IDX_C21F069FFA7089AB (id_groupe), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_objet (id INT AUTO_INCREMENT NOT NULL, id_personnage INT NOT NULL, id_objet INT NOT NULL, quantite SMALLINT NOT NULL, INDEX IDX_EC9E4002E0198227 (id_personnage), INDEX IDX_EC9E4002A5FB23CF (id_objet), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_personnage (id INT AUTO_INCREMENT NOT NULL, id_personnage INT NOT NULL, id_personnage2 INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_F1BF9378E0198227 (id_personnage), INDEX IDX_F1BF937861332E94 (id_personnage2), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_statistiques (id INT AUTO_INCREMENT NOT NULL, id_personnage INT NOT NULL, id_statistique INT NOT NULL, montant_actuel SMALLINT NOT NULL, montant_max SMALLINT NOT NULL, INDEX IDX_95AEC67BE0198227 (id_personnage), INDEX IDX_95AEC67B4BCEA965 (id_statistique), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_support_visuel (id_scenario INT NOT NULL, id_support_visuel INT NOT NULL, INDEX IDX_7898E9EDE04E49DF (id_scenario), INDEX IDX_7898E9ED238B74B7 (id_support_visuel), PRIMARY KEY(id_scenario, id_support_visuel)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_musique (id_scenario INT NOT NULL, id_musique INT NOT NULL, INDEX IDX_F1DB96BCE04E49DF (id_scenario), INDEX IDX_F1DB96BC25E254A1 (id_musique), PRIMARY KEY(id_scenario, id_musique)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_joueur (id_session INT NOT NULL, id_joueur INT NOT NULL, INDEX IDX_921AA39C613FECDF (id_session), INDEX IDX_921AA39CA9E2D76C (id_joueur), PRIMARY KEY(id_session, id_joueur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_action (id_univers INT NOT NULL, id_action INT NOT NULL, INDEX IDX_D9BA531CF61C0B (id_univers), INDEX IDX_D9BA539D32F035 (id_action), PRIMARY KEY(id_univers, id_action)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_classe (id_univers INT NOT NULL, id_classe INT NOT NULL, INDEX IDX_C89289571CF61C0B (id_univers), INDEX IDX_C89289578F5EA509 (id_classe), PRIMARY KEY(id_univers, id_classe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_race (id_univers INT NOT NULL, id_race INT NOT NULL, INDEX IDX_44F7344B1CF61C0B (id_univers), INDEX IDX_44F7344B6E59D40D (id_race), PRIMARY KEY(id_univers, id_race)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme_personnage ADD CONSTRAINT FK_BC1F42C521D9C0A FOREIGN KEY (id_arme) REFERENCES arme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arme_personnage ADD CONSTRAINT FK_BC1F42C55E315342 FOREIGN KEY (id_personnage) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_succes ADD CONSTRAINT FK_5679330FA9E2D76C FOREIGN KEY (id_joueur) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_succes ADD CONSTRAINT FK_5679330F4EF1B4AB FOREIGN KEY (id_succes) REFERENCES succes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_partie ADD CONSTRAINT FK_EC200FB1A9E2D76C FOREIGN KEY (id_joueur) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_partie ADD CONSTRAINT FK_EC200FB1E075F7A4 FOREIGN KEY (id_partie) REFERENCES partie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_personnage ADD CONSTRAINT FK_FA4CF31A9E2D76C FOREIGN KEY (id_joueur) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_personnage ADD CONSTRAINT FK_FA4CF315E315342 FOREIGN KEY (id_personnage) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musique_type_musique ADD CONSTRAINT FK_3EC161C125E254A1 FOREIGN KEY (id_musique) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musique_type_musique ADD CONSTRAINT FK_3EC161C138E18284 FOREIGN KEY (id_type_musique) REFERENCES type_musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_etat ADD CONSTRAINT FK_C8A920C5E315342 FOREIGN KEY (id_personnage) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_etat ADD CONSTRAINT FK_C8A920CD5E86FF FOREIGN KEY (id_etat) REFERENCES etat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36AE0198227 FOREIGN KEY (id_personnage) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36AAB5ECCCE FOREIGN KEY (id_competence) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE personnage_groupe ADD CONSTRAINT FK_C21F069FE0198227 FOREIGN KEY (id_personnage) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_groupe ADD CONSTRAINT FK_C21F069FFA7089AB FOREIGN KEY (id_groupe) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE personnage_objet ADD CONSTRAINT FK_EC9E4002E0198227 FOREIGN KEY (id_personnage) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_objet ADD CONSTRAINT FK_EC9E4002A5FB23CF FOREIGN KEY (id_objet) REFERENCES objet (id)');
        $this->addSql('ALTER TABLE personnage_personnage ADD CONSTRAINT FK_F1BF9378E0198227 FOREIGN KEY (id_personnage) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_personnage ADD CONSTRAINT FK_F1BF937861332E94 FOREIGN KEY (id_personnage2) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_statistiques ADD CONSTRAINT FK_95AEC67BE0198227 FOREIGN KEY (id_personnage) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_statistiques ADD CONSTRAINT FK_95AEC67B4BCEA965 FOREIGN KEY (id_statistique) REFERENCES statistiques (id)');
        $this->addSql('ALTER TABLE scenario_support_visuel ADD CONSTRAINT FK_7898E9EDE04E49DF FOREIGN KEY (id_scenario) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_support_visuel ADD CONSTRAINT FK_7898E9ED238B74B7 FOREIGN KEY (id_support_visuel) REFERENCES support_visuel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_musique ADD CONSTRAINT FK_F1DB96BCE04E49DF FOREIGN KEY (id_scenario) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_musique ADD CONSTRAINT FK_F1DB96BC25E254A1 FOREIGN KEY (id_musique) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_joueur ADD CONSTRAINT FK_921AA39C613FECDF FOREIGN KEY (id_session) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_joueur ADD CONSTRAINT FK_921AA39CA9E2D76C FOREIGN KEY (id_joueur) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_action ADD CONSTRAINT FK_D9BA531CF61C0B FOREIGN KEY (id_univers) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_action ADD CONSTRAINT FK_D9BA539D32F035 FOREIGN KEY (id_action) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_classe ADD CONSTRAINT FK_C89289571CF61C0B FOREIGN KEY (id_univers) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_classe ADD CONSTRAINT FK_C89289578F5EA509 FOREIGN KEY (id_classe) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_race ADD CONSTRAINT FK_44F7344B1CF61C0B FOREIGN KEY (id_univers) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_race ADD CONSTRAINT FK_44F7344B6E59D40D FOREIGN KEY (id_race) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action ADD id_complexite INT NOT NULL');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C927E20CD04 FOREIGN KEY (id_complexite) REFERENCES complexite (id)');
        $this->addSql('CREATE INDEX IDX_47CC8C927E20CD04 ON action (id_complexite)');
        $this->addSql('ALTER TABLE arme ADD id_univers INT NOT NULL, ADD id_type_arme INT NOT NULL');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_18207379B97C9CDC FOREIGN KEY (id_univers) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_182073799FD868D FOREIGN KEY (id_type_arme) REFERENCES type_arme (id)');
        $this->addSql('CREATE INDEX IDX_18207379B97C9CDC ON arme (id_univers)');
        $this->addSql('CREATE INDEX IDX_182073799FD868D ON arme (id_type_arme)');
        $this->addSql('ALTER TABLE campagne ADD id_univers INT NOT NULL');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16B97C9CDC FOREIGN KEY (id_univers) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_539B5D16B97C9CDC ON campagne (id_univers)');
        $this->addSql('ALTER TABLE objet ADD id_univers INT NOT NULL');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C38B97C9CDC FOREIGN KEY (id_univers) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C38B97C9CDC ON objet (id_univers)');
        $this->addSql('ALTER TABLE partie ADD id_scenario INT NOT NULL');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DF85C8428 FOREIGN KEY (id_scenario) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_59B1F3DF85C8428 ON partie (id_scenario)');
        $this->addSql('ALTER TABLE personnage ADD id_race INT NOT NULL, ADD id_classe INT NOT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DB0C47D7D FOREIGN KEY (id_race) REFERENCES race (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DF6B192E FOREIGN KEY (id_classe) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_6AEA486DB0C47D7D ON personnage (id_race)');
        $this->addSql('CREATE INDEX IDX_6AEA486DF6B192E ON personnage (id_classe)');
        $this->addSql('ALTER TABLE scenario ADD id_difficulte INT NOT NULL, ADD id_lore INT NOT NULL, ADD id_campagne INT NOT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8581DA4EC FOREIGN KEY (id_difficulte) REFERENCES difficulte (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8E0AF45AC FOREIGN KEY (id_lore) REFERENCES lore (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8E30BE83 FOREIGN KEY (id_campagne) REFERENCES campagne (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8581DA4EC ON scenario (id_difficulte)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3E45C8D8E0AF45AC ON scenario (id_lore)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8E30BE83 ON scenario (id_campagne)');
        $this->addSql('ALTER TABLE session ADD id_partie INT NOT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D460404B83 FOREIGN KEY (id_partie) REFERENCES partie (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D460404B83 ON session (id_partie)');
        $this->addSql('ALTER TABLE statistiques ADD id_univers INT NOT NULL');
        $this->addSql('ALTER TABLE statistiques ADD CONSTRAINT FK_B31AB066B97C9CDC FOREIGN KEY (id_univers) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_B31AB066B97C9CDC ON statistiques (id_univers)');
        $this->addSql('ALTER TABLE type_arme ADD id_univers INT NOT NULL');
        $this->addSql('ALTER TABLE type_arme ADD CONSTRAINT FK_CF2FB671B97C9CDC FOREIGN KEY (id_univers) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_CF2FB671B97C9CDC ON type_arme (id_univers)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article_blog');
        $this->addSql('DROP TABLE arme_personnage');
        $this->addSql('DROP TABLE joueur_succes');
        $this->addSql('DROP TABLE joueur_partie');
        $this->addSql('DROP TABLE joueur_personnage');
        $this->addSql('DROP TABLE musique_type_musique');
        $this->addSql('DROP TABLE personnage_etat');
        $this->addSql('DROP TABLE personnage_competence');
        $this->addSql('DROP TABLE personnage_groupe');
        $this->addSql('DROP TABLE personnage_objet');
        $this->addSql('DROP TABLE personnage_personnage');
        $this->addSql('DROP TABLE personnage_statistiques');
        $this->addSql('DROP TABLE scenario_support_visuel');
        $this->addSql('DROP TABLE scenario_musique');
        $this->addSql('DROP TABLE session_joueur');
        $this->addSql('DROP TABLE univers_action');
        $this->addSql('DROP TABLE univers_classe');
        $this->addSql('DROP TABLE univers_race');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C927E20CD04');
        $this->addSql('DROP INDEX IDX_47CC8C927E20CD04 ON action');
        $this->addSql('ALTER TABLE action DROP id_complexite');
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_18207379B97C9CDC');
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_182073799FD868D');
        $this->addSql('DROP INDEX IDX_18207379B97C9CDC ON arme');
        $this->addSql('DROP INDEX IDX_182073799FD868D ON arme');
        $this->addSql('ALTER TABLE arme DROP id_univers, DROP id_type_arme');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16B97C9CDC');
        $this->addSql('DROP INDEX IDX_539B5D16B97C9CDC ON campagne');
        $this->addSql('ALTER TABLE campagne DROP id_univers');
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C38B97C9CDC');
        $this->addSql('DROP INDEX IDX_46CD4C38B97C9CDC ON objet');
        $this->addSql('ALTER TABLE objet DROP id_univers');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DF85C8428');
        $this->addSql('DROP INDEX IDX_59B1F3DF85C8428 ON partie');
        $this->addSql('ALTER TABLE partie DROP id_scenario');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DB0C47D7D');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DF6B192E');
        $this->addSql('DROP INDEX IDX_6AEA486DB0C47D7D ON personnage');
        $this->addSql('DROP INDEX IDX_6AEA486DF6B192E ON personnage');
        $this->addSql('ALTER TABLE personnage DROP id_race, DROP id_classe');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8581DA4EC');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8E0AF45AC');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8E30BE83');
        $this->addSql('DROP INDEX IDX_3E45C8D8581DA4EC ON scenario');
        $this->addSql('DROP INDEX UNIQ_3E45C8D8E0AF45AC ON scenario');
        $this->addSql('DROP INDEX IDX_3E45C8D8E30BE83 ON scenario');
        $this->addSql('ALTER TABLE scenario DROP id_difficulte, DROP id_lore, DROP id_campagne');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D460404B83');
        $this->addSql('DROP INDEX IDX_D044D5D460404B83 ON session');
        $this->addSql('ALTER TABLE session DROP id_partie');
        $this->addSql('ALTER TABLE statistiques DROP FOREIGN KEY FK_B31AB066B97C9CDC');
        $this->addSql('DROP INDEX IDX_B31AB066B97C9CDC ON statistiques');
        $this->addSql('ALTER TABLE statistiques DROP id_univers');
        $this->addSql('ALTER TABLE type_arme DROP FOREIGN KEY FK_CF2FB671B97C9CDC');
        $this->addSql('DROP INDEX IDX_CF2FB671B97C9CDC ON type_arme');
        $this->addSql('ALTER TABLE type_arme DROP id_univers');
    }
}
