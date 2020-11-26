-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26-Nov-2020 às 13:47
-- Versão do servidor: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancoSite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cliente`
--

CREATE TABLE `Cliente` (
  `codigoCliente` int(11) NOT NULL,
  `cpfCliente` varchar(14) DEFAULT NULL,
  `cnpjCliente` varchar(20) DEFAULT NULL,
  `emailCliente` varchar(250) DEFAULT NULL,
  `nomeDaEmpresaCliente` varchar(200) DEFAULT NULL,
  `codigoFKSLogin` int(11) DEFAULT NULL,
  `nomeCliente` varchar(150) DEFAULT NULL,
  `codigoFKSEndereco` int(11) DEFAULT NULL,
  `codigoFKSTelefone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Cliente`
--

INSERT INTO `Cliente` (`codigoCliente`, `cpfCliente`, `cnpjCliente`, `emailCliente`, `nomeDaEmpresaCliente`, `codigoFKSLogin`, `nomeCliente`, `codigoFKSEndereco`, `codigoFKSTelefone`) VALUES
(1, '234.567.890-11', '000.000.000/0000', 'costateste@gmail.com', 'AlucardeProdution', 1, 'Carlos Santana', 1, 1),
(2, '456.789.123-00', '000.000.000/0000', 'anazinha1234@gmail.com', 'Freelance', 2, 'Ana Vitoria Santana Souza', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Endereco`
--

CREATE TABLE `Endereco` (
  `codigoEndereco` int(11) NOT NULL,
  `estado` varchar(110) DEFAULT NULL,
  `endereco` varchar(110) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Endereco`
--

INSERT INTO `Endereco` (`codigoEndereco`, `estado`, `endereco`, `bairro`, `cep`, `cidade`, `uf`) VALUES
(1, 'São Paualo', 'Rua Guaipá', 'Vila Leopodin', '01236-165', 'São Paulo', 'SP'),
(2, 'São Paulo', 'santana da samtana', 'jardim Grande', '02365-456', 'São Paulo', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Login`
--

CREATE TABLE `Login` (
  `codigoLogin` int(11) NOT NULL,
  `loginUser` varchar(120) DEFAULT NULL,
  `senhaSocio` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Login`
--

INSERT INTO `Login` (`codigoLogin`, `loginUser`, `senhaSocio`) VALUES
(1, 'Carlos', '12345678910'),
(2, 'Ana Juliana', '0123456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pedido`
--

CREATE TABLE `Pedido` (
  `codigoPedido` int(11) NOT NULL,
  `codigoFKSCliente` int(11) DEFAULT NULL,
  `nomeDoPedido` varchar(130) DEFAULT NULL,
  `respostaDoPedido` char(4) DEFAULT NULL,
  `descricaoDoPedido` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Telefone`
--

CREATE TABLE `Telefone` (
  `codigoTelefone` int(11) NOT NULL,
  `telefone1` varchar(25) DEFAULT NULL,
  `telefone2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Telefone`
--

INSERT INTO `Telefone` (`codigoTelefone`, `telefone1`, `telefone2`) VALUES
(1, '(11) 98745-7894', '(11) 4000-5000'),
(2, '(11) 95949-5000', '(11) 3698-5289');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD KEY `codigoFKSLogin` (`codigoFKSLogin`),
  ADD KEY `codigoFKSEndereco` (`codigoFKSEndereco`),
  ADD KEY `codigoFKSTelefone` (`codigoFKSTelefone`);

--
-- Indexes for table `Endereco`
--
ALTER TABLE `Endereco`
  ADD PRIMARY KEY (`codigoEndereco`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`codigoLogin`);

--
-- Indexes for table `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`codigoPedido`),
  ADD KEY `FKScodigoClientePedido` (`codigoFKSCliente`);

--
-- Indexes for table `Telefone`
--
ALTER TABLE `Telefone`
  ADD PRIMARY KEY (`codigoTelefone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `codigoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `Cliente_ibfk_1` FOREIGN KEY (`codigoFKSLogin`) REFERENCES `Login` (`codigoLogin`),
  ADD CONSTRAINT `Cliente_ibfk_2` FOREIGN KEY (`codigoFKSEndereco`) REFERENCES `Endereco` (`codigoEndereco`),
  ADD CONSTRAINT `Cliente_ibfk_3` FOREIGN KEY (`codigoFKSTelefone`) REFERENCES `Telefone` (`codigoTelefone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
