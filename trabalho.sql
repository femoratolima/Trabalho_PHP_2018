-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2018 às 00:53
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `endereco` varchar(35) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `endereco`, `cidade`, `email`, `saldo`) VALUES
(1, 'Fernando Morato', 'João Batista de Freitas, 60', 'Assis', 'femoratolima@hotmail.com', 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `data`, `cliente`) VALUES
(1, '2018-09-14', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE `item_compra` (
  `id` int(11) NOT NULL,
  `compra` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_compra`
--

INSERT INTO `item_compra` (`id`, `compra`, `produto`, `quantidade`, `valor`) VALUES
(1, 1, 1, 10, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(35) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `quantidade`, `valor`) VALUES
(1, 'Arroz', 20, 6),
(8, 'Banana', 5, 2),
(9, 'Carvalho', 50, 100),
(10, 'Cerejeira', 50, 500),
(11, 'Nogueira', 100, 300),
(12, 'Cedro', 50, 600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pwd`) VALUES
(1, 'fernandomorato', '381e40b2eafcadbb2024e27e5f44a8e1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_compra` (`cliente`);

--
-- Indexes for table `item_compra`
--
ALTER TABLE `item_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemcompra_produto` (`produto`),
  ADD KEY `itemcompra_compra` (`compra`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_compra`
--
ALTER TABLE `item_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `cliente_compra` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `item_compra`
--
ALTER TABLE `item_compra`
  ADD CONSTRAINT `itemcompra_compra` FOREIGN KEY (`compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `itemcompra_produto` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
