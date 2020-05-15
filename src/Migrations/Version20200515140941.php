<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200515140941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE help_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_back_office_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE app_users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE help (id INT NOT NULL, updated_by_id INT DEFAULT NULL, subject VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, page VARCHAR(255) NOT NULL, content TEXT NOT NULL, is_active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8875CAC896DBBDE ON help (updated_by_id)');
        $this->addSql('CREATE INDEX search_help_idx ON help (subject, page)');
        $this->addSql('CREATE TABLE user_back_office (id INT NOT NULL, updated_by_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, identity VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C606ABDE7927C74 ON user_back_office (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C606ABD6A95E9C4 ON user_back_office (identity)');
        $this->addSql('CREATE INDEX IDX_C606ABD896DBBDE ON user_back_office (updated_by_id)');
        $this->addSql('CREATE INDEX search_by_email ON user_back_office (email)');
        $this->addSql('COMMENT ON COLUMN user_back_office.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE app_users (id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, birth_date DATE DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, birth_country VARCHAR(255) DEFAULT NULL, open_id VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, identity VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, roles TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F89B8A9C ON app_users (open_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C25028246A95E9C4 ON app_users (identity)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824E7927C74 ON app_users (email)');
        $this->addSql('CREATE INDEX IDX_C2502824B03A8386 ON app_users (created_by_id)');
        $this->addSql('CREATE INDEX IDX_C2502824896DBBDE ON app_users (updated_by_id)');
        $this->addSql('CREATE INDEX search_by_phonenumber ON app_users (phone_number)');
        $this->addSql('CREATE INDEX search_by_identity ON app_users (identity)');
        $this->addSql('COMMENT ON COLUMN app_users.roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user_back_office (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_back_office ADD CONSTRAINT FK_C606ABD896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user_back_office (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE app_users ADD CONSTRAINT FK_C2502824B03A8386 FOREIGN KEY (created_by_id) REFERENCES app_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE app_users ADD CONSTRAINT FK_C2502824896DBBDE FOREIGN KEY (updated_by_id) REFERENCES app_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CAC896DBBDE');
        $this->addSql('ALTER TABLE user_back_office DROP CONSTRAINT FK_C606ABD896DBBDE');
        $this->addSql('ALTER TABLE app_users DROP CONSTRAINT FK_C2502824B03A8386');
        $this->addSql('ALTER TABLE app_users DROP CONSTRAINT FK_C2502824896DBBDE');
        $this->addSql('DROP SEQUENCE help_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_back_office_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE app_users_id_seq CASCADE');
        $this->addSql('DROP TABLE help');
        $this->addSql('DROP TABLE user_back_office');
        $this->addSql('DROP TABLE app_users');
    }
}
