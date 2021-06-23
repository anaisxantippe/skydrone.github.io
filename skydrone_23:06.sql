-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : mer. 23 juin 2021 à 18:35
-- Version du serveur :  5.7.33
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `skydrone`
--

-- --------------------------------------------------------

--
-- Structure de la table `Bill`
--

CREATE TABLE `Bill` (
  `bill_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Customers`
--

CREATE TABLE `Customers` (
  `customer_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `delivery_adress` varchar(100) NOT NULL,
  `delivery_zip` varchar(50) NOT NULL,
  `delivery_city` varchar(60) NOT NULL,
  `delivery_country` varchar(50) NOT NULL,
  `billing_adress` varchar(100) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zip` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `vat` int(11) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `sd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Delivery_form`
--

CREATE TABLE `Delivery_form` (
  `delivery_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Executives`
--

CREATE TABLE `Executives` (
  `executives_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Opinion`
--

CREATE TABLE `Opinion` (
  `opinion_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delayed_payment` tinyint(1) NOT NULL,
  `df_total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payed` tinyint(1) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Product`
--

CREATE TABLE `Product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `df_price` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `suppliers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Product`
--

INSERT INTO `Product` (`product_id`, `product_name`, `description`, `df_price`, `picture`, `suppliers_id`) VALUES
(1, 'Mini 2 de DJI', 'Le drone DJI Mini 2 est un drone pliable, extrêmement léger qui vous permet de réaliser des photographies et des vidéos à couper le souffle, et ce, le plus simplement du monde !', 459, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/phpXjjcAw', NULL),
(2, 'Ryze Tello - with DJI', 'Le Ryze Tello (with DJI) est la nouvelle génération de drones « jouet » alliant à la fois le côté éducatif et le côté ludique !\r\nTello fait la taille de votre main. Il pèse seulement 85g et vous propose divers modes de vol ainsi que des assistances de vol pour une sécurité accrue.', 109, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/phpOGMTiZ', NULL),
(3, 'Drone FPV AcroBee BL BNF - NewBeeDrone', 'Ce Tiny n\'a de petit que son châssis tant sa nervosité est surprenante ! Avec son coloris jaune transparent et son carénage agressif, il profite de moteurs brushless ultra-performants et puissants.', 140, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/php7zmP6Q', NULL),
(4, 'Bundle AcroBee RTF - NewBeeDrone', 'Le pack se compose d\'un nano-drone puissant, résistant et rapide, de sa radiocommande de contrôle, de 4 batteries avec chargeur et d\'un casque FPV pour une immersion totale. C\'est tout simplement le kit parfait pour débuter dans la pratique du FPV et/ou pour les enfants !', 219, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/phpA3JQv4', NULL),
(5, 'Drone AcroBee65 BeeBrainBL BNF - NewBeeDrone', 'Newbee vous propose son dernier tinywhoop AcroBee65 ! On retrouve un micro drone FPV performant et fun pour débuter votre apprentissage ! \r\nEquipé de moteurs brushless, il est rapide et parfaitement stable en vol, que ce soit en intérieur comme en extérieur.', 159, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/phpaGAJZj', NULL),
(6, 'Drone sous-marin Fifish V6 & Casque Head Tracking', 'Le drone Fifish V6 est le dernier né de la firme Qysea dont le cœur de métier est dédié à l\'exploration sous-marine. Fifish V6 est un drone révolutionnaire permettant de réaliser des images aquatiques (photo et vidéos) bluffantes.', 1999, '/private/var/folders/k3/206x0v7n2ln_htyfjsnzybz40000gn/T/phpmvbv72', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Resource_department`
--

CREATE TABLE `Resource_department` (
  `rd_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Sales_department`
--

CREATE TABLE `Sales_department` (
  `sd_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Suppliers`
--

CREATE TABLE `Suppliers` (
  `suppliers_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `siret` varchar(50) NOT NULL,
  `rd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`user_id`, `role`, `pass`, `username`, `mail`) VALUES
(4, 'secretaire', '$2y$13$8t4fTP00taabZ8yFlPsbROdriiwpzXAG.0I2u9s.zHpHDvAGBpfra', 'Testemail', 'test@mail.com'),
(5, 'secretaire', '$2y$13$gCVmnNoXQQqFAKY7YxYT9uDIJ035XwPrC4PY/STvU2x5x45De9R4G', 'testemail', 'test2@mail.com'),
(6, 'secretaire', '$2y$13$T5edLnd1Li1Ctk4fA5Cssezfev4DQN.j.L3L/P7/SvDuqclwgEnJi', 'testlog', 'truc@gmail.com'),
(7, 'secretaire', '$2y$13$PmAF5jO8j.9JImXD4rSfzuzFHN1SzafZ.PFJraDXX6HoBFGlXeo9q', 'testlog', 'test3@mail.com'),
(8, 'secretaire', '$2y$13$1w4TINe4Xgd1/4/..4Zbm.Nd0qUVK39Y./bybRxCwAJ9Ut/.Ukka.', 'testlog', 'test4@mail.com'),
(9, 'secretaire', '$2y$13$W.phQgBfak9lTT4FrU8St.d18ALtVg1ek3EcCUqb4hiPN4pUsMCcS', 'testlog2', 'mail@mail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Index pour la table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `sd_id` (`sd_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Delivery_form`
--
ALTER TABLE `Delivery_form`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Index pour la table `Executives`
--
ALTER TABLE `Executives`
  ADD PRIMARY KEY (`executives_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Opinion`
--
ALTER TABLE `Opinion`
  ADD PRIMARY KEY (`opinion_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `suppliers_id` (`suppliers_id`);

--
-- Index pour la table `Resource_department`
--
ALTER TABLE `Resource_department`
  ADD PRIMARY KEY (`rd_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Sales_department`
--
ALTER TABLE `Sales_department`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`suppliers_id`),
  ADD KEY `rd_id` (`rd_id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Bill`
--
ALTER TABLE `Bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Delivery_form`
--
ALTER TABLE `Delivery_form`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Executives`
--
ALTER TABLE `Executives`
  MODIFY `executives_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Opinion`
--
ALTER TABLE `Opinion`
  MODIFY `opinion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Resource_department`
--
ALTER TABLE `Resource_department`
  MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Sales_department`
--
ALTER TABLE `Sales_department`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Suppliers`
--
ALTER TABLE `Suppliers`
  MODIFY `suppliers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

--
-- Contraintes pour la table `Customers`
--
ALTER TABLE `Customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`sd_id`) REFERENCES `sales_department` (`sd_id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `Delivery_form`
--
ALTER TABLE `Delivery_form`
  ADD CONSTRAINT `delivery_form_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

--
-- Contraintes pour la table `Executives`
--
ALTER TABLE `Executives`
  ADD CONSTRAINT `executives_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `Opinion`
--
ALTER TABLE `Opinion`
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`),
  ADD CONSTRAINT `opinion_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`);

--
-- Contraintes pour la table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

--
-- Contraintes pour la table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`suppliers_id`) REFERENCES `Suppliers` (`suppliers_id`);

--
-- Contraintes pour la table `Resource_department`
--
ALTER TABLE `Resource_department`
  ADD CONSTRAINT `resource_department_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `Sales_department`
--
ALTER TABLE `Sales_department`
  ADD CONSTRAINT `sales_department_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`rd_id`) REFERENCES `Resource_department` (`rd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
