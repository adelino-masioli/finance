-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 06-Fev-2018 às 15:17
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_hotmilhas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Telefone', 'Categoria de lançamento de telefone', 1, '2018-02-06 02:15:55', '2018-02-06 02:15:55'),
(2, 'Supermercado', 'Categoria de lançamento de supermercado', 1, '2018-02-06 02:15:55', '2018-02-06 02:15:55'),
(3, 'Água', 'Categoria de lançamento de água', 1, '2018-02-06 02:15:55', '2018-02-06 02:15:55'),
(4, 'Luz', 'Categoria de lançamento de luz', 1, '2018-02-06 02:15:55', '2018-02-06 02:15:55'),
(5, 'Faculdade', 'Categoria Faculdade', 2, '2018-02-06 14:30:30', '2018-02-06 15:11:39'),
(6, 'Academia', 'Gastos com academia', 2, '2018-02-06 15:11:51', '2018-02-06 15:11:51'),
(7, 'Cursos', 'Gastos com cursos', 2, '2018-02-06 15:12:17', '2018-02-06 15:12:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170309181200, 'CreateUsersTable', '2018-02-06 06:15:55', '2018-02-06 06:15:55', 0),
(20170322233428, 'CreateCategoriesTable', '2018-02-06 06:15:55', '2018-02-06 06:15:55', 0),
(20170413040658, 'CreateReceivesTable', '2018-02-06 06:15:55', '2018-02-06 06:15:55', 0),
(20170413045149, 'CreatePaysTable', '2018-02-06 06:15:55', '2018-02-06 06:15:55', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_launch` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pays`
--

INSERT INTO `pays` (`id`, `date_launch`, `name`, `value`, `status`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '2018-02-15', 'Pagamento de telefone', 150, 1, 1, 1, '2018-02-06 02:16:47', '2018-02-06 15:09:24'),
(2, '2018-02-16', 'Pagamento da notinha do mercado do Sebastião', 235, 1, 1, 2, '2018-02-06 15:10:03', '2018-02-06 15:10:03'),
(3, '2018-02-22', 'Pagamento do parcelamento de 78x da faculdade', 663, 1, 2, 5, '2018-02-06 15:12:57', '2018-02-06 15:12:57'),
(4, '2018-02-12', 'Academia', 68, 1, 2, 6, '2018-02-06 15:13:12', '2018-02-06 15:13:12'),
(5, '2018-02-15', 'Curso de Inglês', 225, 1, 2, 7, '2018-02-06 15:13:33', '2018-02-06 15:13:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receives`
--

DROP TABLE IF EXISTS `receives`;
CREATE TABLE IF NOT EXISTS `receives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_launch` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receives`
--

INSERT INTO `receives` (`id`, `date_launch`, `name`, `value`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2018-03-02', 'Cheque da venda do Fuscão Preto', 3600, 1, 1, '2018-02-06 02:22:27', '2018-02-06 15:10:43'),
(2, '2018-02-06', 'Freela implantação de sistemas', 2380, 2, 2, '2018-02-06 15:14:09', '2018-02-06 15:14:09'),
(3, '2018-02-18', '2ª parcela do site Marias Mineiras', 1480, 1, 2, '2018-02-06 15:14:57', '2018-02-06 15:14:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'ADMIN', 'admin@admin.com', '$2y$10$x2racehhA2IIWKnudUUiIO10NnVhLTsML4jShh08IuSmLR10QU0dG', '2018-02-06 02:15:55', '2018-02-06 02:15:55'),
(2, 'Junior', 'Ferreira', 'alfjuniorbh.web@gmail.com', '$2y$10$N1hj/IqL6vwr.xehfNcgf.kbqdSr60ocaT11Ukc5sqEp95GDGNtJe', '2018-02-06 02:15:55', '2018-02-06 02:15:55');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Limitadores para a tabela `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
