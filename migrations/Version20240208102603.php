<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208102603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, valeur VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE moyen_paiement (id INT AUTO_INCREMENT NOT NULL, valeur VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix NUMERIC(5, 2) NOT NULL, description LONGTEXT NOT NULL, online TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE produit_couleur (produit_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_FAF60C9CF347EFB (produit_id), INDEX IDX_FAF60C9CC31BA576 (couleur_id), PRIMARY KEY(produit_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE produit_taille (produit_id INT NOT NULL, taille_id INT NOT NULL, INDEX IDX_81024002F347EFB (produit_id), INDEX IDX_81024002FF25611A (taille_id), PRIMARY KEY(produit_id, taille_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE produit_moyen_paiement (produit_id INT NOT NULL, moyen_paiement_id INT NOT NULL, INDEX IDX_8C01B6A7F347EFB (produit_id), INDEX IDX_8C01B6A79C7E259C (moyen_paiement_id), PRIMARY KEY(produit_id, moyen_paiement_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, valeur VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_taille ADD CONSTRAINT FK_81024002F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_taille ADD CONSTRAINT FK_81024002FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_moyen_paiement ADD CONSTRAINT FK_8C01B6A7F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_moyen_paiement ADD CONSTRAINT FK_8C01B6A79C7E259C FOREIGN KEY (moyen_paiement_id) REFERENCES moyen_paiement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CF347EFB');
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CC31BA576');
        $this->addSql('ALTER TABLE produit_taille DROP FOREIGN KEY FK_81024002F347EFB');
        $this->addSql('ALTER TABLE produit_taille DROP FOREIGN KEY FK_81024002FF25611A');
        $this->addSql('ALTER TABLE produit_moyen_paiement DROP FOREIGN KEY FK_8C01B6A7F347EFB');
        $this->addSql('ALTER TABLE produit_moyen_paiement DROP FOREIGN KEY FK_8C01B6A79C7E259C');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE moyen_paiement');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_couleur');
        $this->addSql('DROP TABLE produit_taille');
        $this->addSql('DROP TABLE produit_moyen_paiement');
        $this->addSql('DROP TABLE taille');
    }
}