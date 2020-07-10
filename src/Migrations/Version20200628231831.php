<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200628231831  extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, id_complexite_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_47CC8C927E20CD04 (id_complexite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme (id INT AUTO_INCREMENT NOT NULL, id_univers_id INT NOT NULL, id_type_arme_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, degats_base SMALLINT DEFAULT NULL, degats_de SMALLINT DEFAULT NULL, INDEX IDX_18207379B97C9CDC (id_univers_id), INDEX IDX_182073799FD868D (id_type_arme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_personnage (arme_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_BC1F42C521D9C0A (arme_id), INDEX IDX_BC1F42C55E315342 (personnage_id), PRIMARY KEY(arme_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_blog (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, contenu VARCHAR(5000) NOT NULL, auteur VARCHAR(50) NOT NULL, image VARCHAR(350) DEFAULT NULL, alt VARCHAR(255) NOT NULL, metatitle VARCHAR(255) NOT NULL, metadescription VARCHAR(255) NOT NULL, metakeywords VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campagne (id INT AUTO_INCREMENT NOT NULL, id_univers_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_539B5D16B97C9CDC (id_univers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, modificateur VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE complexite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, points SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE difficulte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, motdepasse VARCHAR(50) NOT NULL, date_inscription DATETIME NOT NULL, notes VARCHAR(255) DEFAULT NULL, numero_portable VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_succes (joueur_id INT NOT NULL, succes_id INT NOT NULL, INDEX IDX_5679330FA9E2D76C (joueur_id), INDEX IDX_5679330F4EF1B4AB (succes_id), PRIMARY KEY(joueur_id, succes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_partie (joueur_id INT NOT NULL, partie_id INT NOT NULL, INDEX IDX_EC200FB1A9E2D76C (joueur_id), INDEX IDX_EC200FB1E075F7A4 (partie_id), PRIMARY KEY(joueur_id, partie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_personnage (joueur_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_FA4CF31A9E2D76C (joueur_id), INDEX IDX_FA4CF315E315342 (personnage_id), PRIMARY KEY(joueur_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lore (id INT AUTO_INCREMENT NOT NULL, fichier VARCHAR(350) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, lien VARCHAR(350) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musique_type_musique (musique_id INT NOT NULL, type_musique_id INT NOT NULL, INDEX IDX_3EC161C125E254A1 (musique_id), INDEX IDX_3EC161C138E18284 (type_musique_id), PRIMARY KEY(musique_id, type_musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objet (id INT AUTO_INCREMENT NOT NULL, id_univers_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, poids SMALLINT NOT NULL, INDEX IDX_46CD4C38B97C9CDC (id_univers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partie (id INT AUTO_INCREMENT NOT NULL, id_scenario_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, duree TIME DEFAULT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME DEFAULT NULL, INDEX IDX_59B1F3DF85C8428 (id_scenario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, id_race_id INT NOT NULL, id_classe_id INT NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) NOT NULL, genre SMALLINT NOT NULL, background VARCHAR(255) DEFAULT NULL, description_physique VARCHAR(255) DEFAULT NULL, image VARCHAR(350) DEFAULT NULL, INDEX IDX_6AEA486DB0C47D7D (id_race_id), INDEX IDX_6AEA486DF6B192E (id_classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_etat (personnage_id INT NOT NULL, etat_id INT NOT NULL, INDEX IDX_C8A920C5E315342 (personnage_id), INDEX IDX_C8A920CD5E86FF (etat_id), PRIMARY KEY(personnage_id, etat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_competence (id INT AUTO_INCREMENT NOT NULL, id_personnage_id INT NOT NULL, id_competence_id INT NOT NULL, niveau SMALLINT NOT NULL, montant SMALLINT NOT NULL, INDEX IDX_F81B36AE0198227 (id_personnage_id), INDEX IDX_F81B36AAB5ECCCE (id_competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_groupe (id INT AUTO_INCREMENT NOT NULL, id_personnage_id INT NOT NULL, id_groupe_id INT NOT NULL, rang SMALLINT NOT NULL, INDEX IDX_C21F069FE0198227 (id_personnage_id), INDEX IDX_C21F069FFA7089AB (id_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_objet (id INT AUTO_INCREMENT NOT NULL, id_personnage_id INT NOT NULL, id_objet_id INT NOT NULL, quantite SMALLINT NOT NULL, INDEX IDX_EC9E4002E0198227 (id_personnage_id), INDEX IDX_EC9E4002A5FB23CF (id_objet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_personnage (id INT AUTO_INCREMENT NOT NULL, id_personnage_id INT NOT NULL, id_personnage2_id INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_F1BF9378E0198227 (id_personnage_id), INDEX IDX_F1BF937861332E94 (id_personnage2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_statistiques (id INT AUTO_INCREMENT NOT NULL, id_personnage_id INT NOT NULL, id_statistique_id INT NOT NULL, montant_actuel SMALLINT NOT NULL, montant_max SMALLINT NOT NULL, INDEX IDX_95AEC67BE0198227 (id_personnage_id), INDEX IDX_95AEC67B4BCEA965 (id_statistique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, modificateur VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, id_difficulte_id INT NOT NULL, id_lore_id INT NOT NULL, id_campagne_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, duree TIME NOT NULL, nb_joueur_min SMALLINT NOT NULL, nb_joueur_max SMALLINT NOT NULL, INDEX IDX_3E45C8D8581DA4EC (id_difficulte_id), UNIQUE INDEX UNIQ_3E45C8D8E0AF45AC (id_lore_id), INDEX IDX_3E45C8D8E30BE83 (id_campagne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_support_visuel (scenario_id INT NOT NULL, support_visuel_id INT NOT NULL, INDEX IDX_7898E9EDE04E49DF (scenario_id), INDEX IDX_7898E9ED238B74B7 (support_visuel_id), PRIMARY KEY(scenario_id, support_visuel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_musique (scenario_id INT NOT NULL, musique_id INT NOT NULL, INDEX IDX_F1DB96BCE04E49DF (scenario_id), INDEX IDX_F1DB96BC25E254A1 (musique_id), PRIMARY KEY(scenario_id, musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, id_partie_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME DEFAULT NULL, INDEX IDX_D044D5D460404B83 (id_partie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_joueur (session_id INT NOT NULL, joueur_id INT NOT NULL, INDEX IDX_921AA39C613FECDF (session_id), INDEX IDX_921AA39CA9E2D76C (joueur_id), PRIMARY KEY(session_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistiques (id INT AUTO_INCREMENT NOT NULL, id_univers_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, modificateur VARCHAR(50) DEFAULT NULL, INDEX IDX_B31AB066B97C9CDC (id_univers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE succes (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_visuel (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, lien VARCHAR(350) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_arme (id INT AUTO_INCREMENT NOT NULL, id_univers_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_CF2FB671B97C9CDC (id_univers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_musique (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, genre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_action (univers_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_D9BA531CF61C0B (univers_id), INDEX IDX_D9BA539D32F035 (action_id), PRIMARY KEY(univers_id, action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_classe (univers_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_C89289571CF61C0B (univers_id), INDEX IDX_C89289578F5EA509 (classe_id), PRIMARY KEY(univers_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE univers_race (univers_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_44F7344B1CF61C0B (univers_id), INDEX IDX_44F7344B6E59D40D (race_id), PRIMARY KEY(univers_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C927E20CD04 FOREIGN KEY (id_complexite_id) REFERENCES complexite (id)');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_18207379B97C9CDC FOREIGN KEY (id_univers_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_182073799FD868D FOREIGN KEY (id_type_arme_id) REFERENCES type_arme (id)');
        $this->addSql('ALTER TABLE arme_personnage ADD CONSTRAINT FK_BC1F42C521D9C0A FOREIGN KEY (arme_id) REFERENCES arme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arme_personnage ADD CONSTRAINT FK_BC1F42C55E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16B97C9CDC FOREIGN KEY (id_univers_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE joueur_succes ADD CONSTRAINT FK_5679330FA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_succes ADD CONSTRAINT FK_5679330F4EF1B4AB FOREIGN KEY (succes_id) REFERENCES succes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_partie ADD CONSTRAINT FK_EC200FB1A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_partie ADD CONSTRAINT FK_EC200FB1E075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_personnage ADD CONSTRAINT FK_FA4CF31A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_personnage ADD CONSTRAINT FK_FA4CF315E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musique_type_musique ADD CONSTRAINT FK_3EC161C125E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musique_type_musique ADD CONSTRAINT FK_3EC161C138E18284 FOREIGN KEY (type_musique_id) REFERENCES type_musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C38B97C9CDC FOREIGN KEY (id_univers_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DF85C8428 FOREIGN KEY (id_scenario_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DB0C47D7D FOREIGN KEY (id_race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DF6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE personnage_etat ADD CONSTRAINT FK_C8A920C5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_etat ADD CONSTRAINT FK_C8A920CD5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36AE0198227 FOREIGN KEY (id_personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_competence ADD CONSTRAINT FK_F81B36AAB5ECCCE FOREIGN KEY (id_competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE personnage_groupe ADD CONSTRAINT FK_C21F069FE0198227 FOREIGN KEY (id_personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_groupe ADD CONSTRAINT FK_C21F069FFA7089AB FOREIGN KEY (id_groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE personnage_objet ADD CONSTRAINT FK_EC9E4002E0198227 FOREIGN KEY (id_personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_objet ADD CONSTRAINT FK_EC9E4002A5FB23CF FOREIGN KEY (id_objet_id) REFERENCES objet (id)');
        $this->addSql('ALTER TABLE personnage_personnage ADD CONSTRAINT FK_F1BF9378E0198227 FOREIGN KEY (id_personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_personnage ADD CONSTRAINT FK_F1BF937861332E94 FOREIGN KEY (id_personnage2_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_statistiques ADD CONSTRAINT FK_95AEC67BE0198227 FOREIGN KEY (id_personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_statistiques ADD CONSTRAINT FK_95AEC67B4BCEA965 FOREIGN KEY (id_statistique_id) REFERENCES statistiques (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8581DA4EC FOREIGN KEY (id_difficulte_id) REFERENCES difficulte (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8E0AF45AC FOREIGN KEY (id_lore_id) REFERENCES lore (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8E30BE83 FOREIGN KEY (id_campagne_id) REFERENCES campagne (id)');
        $this->addSql('ALTER TABLE scenario_support_visuel ADD CONSTRAINT FK_7898E9EDE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_support_visuel ADD CONSTRAINT FK_7898E9ED238B74B7 FOREIGN KEY (support_visuel_id) REFERENCES support_visuel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_musique ADD CONSTRAINT FK_F1DB96BCE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_musique ADD CONSTRAINT FK_F1DB96BC25E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D460404B83 FOREIGN KEY (id_partie_id) REFERENCES partie (id)');
        $this->addSql('ALTER TABLE session_joueur ADD CONSTRAINT FK_921AA39C613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_joueur ADD CONSTRAINT FK_921AA39CA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistiques ADD CONSTRAINT FK_B31AB066B97C9CDC FOREIGN KEY (id_univers_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE type_arme ADD CONSTRAINT FK_CF2FB671B97C9CDC FOREIGN KEY (id_univers_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE univers_action ADD CONSTRAINT FK_D9BA531CF61C0B FOREIGN KEY (univers_id) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_action ADD CONSTRAINT FK_D9BA539D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_classe ADD CONSTRAINT FK_C89289571CF61C0B FOREIGN KEY (univers_id) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_classe ADD CONSTRAINT FK_C89289578F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_race ADD CONSTRAINT FK_44F7344B1CF61C0B FOREIGN KEY (univers_id) REFERENCES univers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE univers_race ADD CONSTRAINT FK_44F7344B6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE univers_action DROP FOREIGN KEY FK_D9BA539D32F035');
        $this->addSql('ALTER TABLE arme_personnage DROP FOREIGN KEY FK_BC1F42C521D9C0A');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8E30BE83');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DF6B192E');
        $this->addSql('ALTER TABLE univers_classe DROP FOREIGN KEY FK_C89289578F5EA509');
        $this->addSql('ALTER TABLE personnage_competence DROP FOREIGN KEY FK_F81B36AAB5ECCCE');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C927E20CD04');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8581DA4EC');
        $this->addSql('ALTER TABLE personnage_etat DROP FOREIGN KEY FK_C8A920CD5E86FF');
        $this->addSql('ALTER TABLE personnage_groupe DROP FOREIGN KEY FK_C21F069FFA7089AB');
        $this->addSql('ALTER TABLE joueur_succes DROP FOREIGN KEY FK_5679330FA9E2D76C');
        $this->addSql('ALTER TABLE joueur_partie DROP FOREIGN KEY FK_EC200FB1A9E2D76C');
        $this->addSql('ALTER TABLE joueur_personnage DROP FOREIGN KEY FK_FA4CF31A9E2D76C');
        $this->addSql('ALTER TABLE session_joueur DROP FOREIGN KEY FK_921AA39CA9E2D76C');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8E0AF45AC');
        $this->addSql('ALTER TABLE musique_type_musique DROP FOREIGN KEY FK_3EC161C125E254A1');
        $this->addSql('ALTER TABLE scenario_musique DROP FOREIGN KEY FK_F1DB96BC25E254A1');
        $this->addSql('ALTER TABLE personnage_objet DROP FOREIGN KEY FK_EC9E4002A5FB23CF');
        $this->addSql('ALTER TABLE joueur_partie DROP FOREIGN KEY FK_EC200FB1E075F7A4');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D460404B83');
        $this->addSql('ALTER TABLE arme_personnage DROP FOREIGN KEY FK_BC1F42C55E315342');
        $this->addSql('ALTER TABLE joueur_personnage DROP FOREIGN KEY FK_FA4CF315E315342');
        $this->addSql('ALTER TABLE personnage_etat DROP FOREIGN KEY FK_C8A920C5E315342');
        $this->addSql('ALTER TABLE personnage_competence DROP FOREIGN KEY FK_F81B36AE0198227');
        $this->addSql('ALTER TABLE personnage_groupe DROP FOREIGN KEY FK_C21F069FE0198227');
        $this->addSql('ALTER TABLE personnage_objet DROP FOREIGN KEY FK_EC9E4002E0198227');
        $this->addSql('ALTER TABLE personnage_personnage DROP FOREIGN KEY FK_F1BF9378E0198227');
        $this->addSql('ALTER TABLE personnage_personnage DROP FOREIGN KEY FK_F1BF937861332E94');
        $this->addSql('ALTER TABLE personnage_statistiques DROP FOREIGN KEY FK_95AEC67BE0198227');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DB0C47D7D');
        $this->addSql('ALTER TABLE univers_race DROP FOREIGN KEY FK_44F7344B6E59D40D');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DF85C8428');
        $this->addSql('ALTER TABLE scenario_support_visuel DROP FOREIGN KEY FK_7898E9EDE04E49DF');
        $this->addSql('ALTER TABLE scenario_musique DROP FOREIGN KEY FK_F1DB96BCE04E49DF');
        $this->addSql('ALTER TABLE session_joueur DROP FOREIGN KEY FK_921AA39C613FECDF');
        $this->addSql('ALTER TABLE personnage_statistiques DROP FOREIGN KEY FK_95AEC67B4BCEA965');
        $this->addSql('ALTER TABLE joueur_succes DROP FOREIGN KEY FK_5679330F4EF1B4AB');
        $this->addSql('ALTER TABLE scenario_support_visuel DROP FOREIGN KEY FK_7898E9ED238B74B7');
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_182073799FD868D');
        $this->addSql('ALTER TABLE musique_type_musique DROP FOREIGN KEY FK_3EC161C138E18284');
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_18207379B97C9CDC');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16B97C9CDC');
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C38B97C9CDC');
        $this->addSql('ALTER TABLE statistiques DROP FOREIGN KEY FK_B31AB066B97C9CDC');
        $this->addSql('ALTER TABLE type_arme DROP FOREIGN KEY FK_CF2FB671B97C9CDC');
        $this->addSql('ALTER TABLE univers_action DROP FOREIGN KEY FK_D9BA531CF61C0B');
        $this->addSql('ALTER TABLE univers_classe DROP FOREIGN KEY FK_C89289571CF61C0B');
        $this->addSql('ALTER TABLE univers_race DROP FOREIGN KEY FK_44F7344B1CF61C0B');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE arme_personnage');
        $this->addSql('DROP TABLE article_blog');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE complexite');
        $this->addSql('DROP TABLE difficulte');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_succes');
        $this->addSql('DROP TABLE joueur_partie');
        $this->addSql('DROP TABLE joueur_personnage');
        $this->addSql('DROP TABLE lore');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE musique_type_musique');
        $this->addSql('DROP TABLE objet');
        $this->addSql('DROP TABLE partie');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_etat');
        $this->addSql('DROP TABLE personnage_competence');
        $this->addSql('DROP TABLE personnage_groupe');
        $this->addSql('DROP TABLE personnage_objet');
        $this->addSql('DROP TABLE personnage_personnage');
        $this->addSql('DROP TABLE personnage_statistiques');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE scenario_support_visuel');
        $this->addSql('DROP TABLE scenario_musique');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_joueur');
        $this->addSql('DROP TABLE statistiques');
        $this->addSql('DROP TABLE succes');
        $this->addSql('DROP TABLE support_visuel');
        $this->addSql('DROP TABLE type_arme');
        $this->addSql('DROP TABLE type_musique');
        $this->addSql('DROP TABLE univers');
        $this->addSql('DROP TABLE univers_action');
        $this->addSql('DROP TABLE univers_classe');
        $this->addSql('DROP TABLE univers_race');
    }
}
