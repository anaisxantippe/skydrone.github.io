<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622122106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, date DATETIME NOT NULL, topic VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bill CHANGE order_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customers CHANGE sd_id sd_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_form CHANGE order_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE executives CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opinion CHANGE product_id product_id INT DEFAULT NULL, CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE suppliers_id suppliers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resource_department CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sales_department CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suppliers CHANGE rd_id rd_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE Bill CHANGE order_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE Customers CHANGE sd_id sd_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE Delivery_form CHANGE order_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE Executives CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE Opinion CHANGE product_id product_id INT NOT NULL, CHANGE customer_id customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE customer_id customer_id INT NOT NULL, CHANGE product_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE Product CHANGE suppliers_id suppliers_id INT NOT NULL');
        $this->addSql('ALTER TABLE Resource_department CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE Sales_department CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE Suppliers CHANGE rd_id rd_id INT NOT NULL');
    }
}
