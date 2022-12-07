<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207225157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choix (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE component_ux (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multiple (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multiple_choix (multiple_id INT NOT NULL, choix_id INT NOT NULL, INDEX IDX_D9CDBEADAEDC4C7D (multiple_id), INDEX IDX_D9CDBEADD9144651 (choix_id), PRIMARY KEY(multiple_id, choix_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT FK_D9CDBEADAEDC4C7D FOREIGN KEY (multiple_id) REFERENCES multiple (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT FK_D9CDBEADD9144651 FOREIGN KEY (choix_id) REFERENCES choix (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE multiple_choix DROP FOREIGN KEY FK_D9CDBEADAEDC4C7D');
        $this->addSql('ALTER TABLE multiple_choix DROP FOREIGN KEY FK_D9CDBEADD9144651');
        $this->addSql('DROP TABLE choix');
        $this->addSql('DROP TABLE component_ux');
        $this->addSql('DROP TABLE multiple');
        $this->addSql('DROP TABLE multiple_choix');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
