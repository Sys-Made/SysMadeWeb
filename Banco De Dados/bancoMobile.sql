-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 02-Dez-2020 às 17:04
-- Versão do servidor: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancoMobile`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Area`
--

CREATE TABLE `Area` (
  `codigoArea` int(11) NOT NULL,
  `nomeArea` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Area`
--

INSERT INTO `Area` (`codigoArea`, `nomeArea`) VALUES
(1, 'Tecnologia'),
(2, 'Biologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cargo`
--

CREATE TABLE `Cargo` (
  `codigoCargo` int(11) NOT NULL,
  `nomeDoCargo` varchar(100) DEFAULT NULL,
  `valorDasHorasCargo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Cargo`
--

INSERT INTO `Cargo` (`codigoCargo`, `nomeDoCargo`, `valorDasHorasCargo`) VALUES
(1, 'Designer Chefe', '8.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cliente`
--

CREATE TABLE `Cliente` (
  `codigoCliente` int(11) NOT NULL,
  `nomeDoCliente` varchar(100) DEFAULT NULL,
  `cpfCliente` varchar(14) DEFAULT NULL,
  `cnpjCliente` varchar(20) DEFAULT NULL,
  `emailCliente` varchar(250) DEFAULT NULL,
  `nomeDaEmpresaCliente` varchar(200) DEFAULT NULL,
  `codigoFKTelefone` int(11) DEFAULT NULL,
  `codigoFKEndereco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Cliente`
--

INSERT INTO `Cliente` (`codigoCliente`, `nomeDoCliente`, `cpfCliente`, `cnpjCliente`, `emailCliente`, `nomeDaEmpresaCliente`, `codigoFKTelefone`, `codigoFKEndereco`) VALUES
(1, 'Carlos Santana', '234.567.890-11', '12.456.789/4561-00', 'CARLOS@CARLOS.COM', 'Microsolft', 1, 1),
(2, 'Ana juliana', '456.789.123-00', '12.456.789/4561-00', 'anaoffice@gmail.com', 'Ubsolft', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Endereco`
--

CREATE TABLE `Endereco` (
  `codigoEndereco` int(11) NOT NULL,
  `endereco` varchar(110) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Endereco`
--

INSERT INTO `Endereco` (`codigoEndereco`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `uf`) VALUES
(1, 'Rua renato consorte 14', 'Pirituba', 'São Paulo', 'São Paulo', '01236-789', 'sp'),
(2, 'Rua Dom Ruan de andrade 1404', 'Pompeia', 'São Paulo', 'São Paulo', '15236-789', 'sp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Login`
--

CREATE TABLE `Login` (
  `codigoLogin` int(11) NOT NULL,
  `loginSocio` varchar(120) DEFAULT NULL,
  `senhaSocio` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Login`
--

INSERT INTO `Login` (`codigoLogin`, `loginSocio`, `senhaSocio`) VALUES
(1, 'LiderDoProjeto', '12345678910');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Projeto`
--

CREATE TABLE `Projeto` (
  `codigoProjeto` int(11) NOT NULL,
  `nomeDoProjeto` varchar(110) DEFAULT NULL,
  `codigoFKCliente` int(11) DEFAULT NULL,
  `dataDeTermino` date DEFAULT NULL,
  `dataDeInicio` date DEFAULT NULL,
  `horarioEstimadoDoProjeto` decimal(6,2) DEFAULT NULL,
  `descricaoDoProjeto` varchar(600) DEFAULT NULL,
  `statusProjeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Projeto`
--

INSERT INTO `Projeto` (`codigoProjeto`, `nomeDoProjeto`, `codigoFKCliente`, `dataDeTermino`, `dataDeInicio`, `horarioEstimadoDoProjeto`, `descricaoDoProjeto`, `statusProjeto`) VALUES
(1, 'Patric Alison', 2, '2020-12-16', '2020-12-01', '1231.00', 'O Lorem Ipsum Ã© um texto modelo da indÃºstria tipogrÃ¡fica e de impressÃ£o. O Lorem Ipsum tem vindo a ser o texto padrÃ£o usado por estas indÃºstrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espÃ©cime de livro. Este texto nÃ£o sÃ³ sobreviveu 5 sÃ©culos, mas tambÃ©m o salto para a tipografia electrÃ³nica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilizaÃ§Ã£o das folhas de Letraset.', NULL),
(2, 'Site biologia', 2, '2020-12-13', '2020-12-02', '1231.00', 'hadknkchwyhuidnkajdhnksajdbhcsad bkhdbkajsdbhkans khbdaxnkdjsandj asdsahndksanhdxkjsadmhajsdmsakjbdhakj kahbdkjsanxsakdhn', NULL),
(3, 'site centro de tudo', 2, '2020-12-22', '2020-12-02', '1465.00', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum', NULL),
(4, 'mobile rede social', 2, '2020-12-23', '2020-12-02', '2000.00', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens', NULL),
(5, 'Windows form controle de vendas', 2, '2020-12-23', '2020-12-02', '2000.00', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens', NULL),
(6, 'Linux java GAME', 1, '2020-12-23', '2020-12-02', '2000.00', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens', NULL),
(7, 'Linux java planilhas', 1, '2020-12-23', '2020-12-02', '2000.00', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjetoSocio`
--

CREATE TABLE `ProjetoSocio` (
  `codigoProjSoc` int(11) NOT NULL,
  `horasRealizadas` decimal(5,2) DEFAULT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `codigoFKCargo` int(11) DEFAULT NULL,
  `codigoFKProjeto` int(11) DEFAULT NULL,
  `codigoFKArea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ProjetoSocio`
--

INSERT INTO `ProjetoSocio` (`codigoProjSoc`, `horasRealizadas`, `valorTotal`, `codigoFKCargo`, `codigoFKProjeto`, `codigoFKArea`) VALUES
(1, NULL, NULL, 1, 1, 1),
(2, NULL, NULL, 1, 2, 1),
(3, NULL, NULL, 1, 3, 1),
(4, NULL, NULL, 1, 4, 1),
(5, NULL, NULL, 1, 5, 1),
(6, NULL, NULL, 1, 6, 1),
(7, NULL, NULL, 1, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Socio`
--

CREATE TABLE `Socio` (
  `codigoSocio` int(11) NOT NULL,
  `nomeDoSocio` varchar(100) DEFAULT NULL,
  `emailSocio` varchar(250) DEFAULT NULL,
  `codigoFKCargo` int(11) DEFAULT NULL,
  `codigoFKtelefone` int(11) DEFAULT NULL,
  `codigoFKLogin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Socio`
--

INSERT INTO `Socio` (`codigoSocio`, `nomeDoSocio`, `emailSocio`, `codigoFKCargo`, `codigoFKtelefone`, `codigoFKLogin`) VALUES
(1, 'Patric Alison', 'alissonteste@gmail.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Telefone`
--

CREATE TABLE `Telefone` (
  `codigoTelefone` int(11) NOT NULL,
  `telefoneOne` varchar(25) DEFAULT NULL,
  `telefoneTwo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Telefone`
--

INSERT INTO `Telefone` (`codigoTelefone`, `telefoneOne`, `telefoneTwo`) VALUES
(1, '(11) 98745-5632', '(11) 3987-5636'),
(2, '(11) 98745-7894', '(11) 4000-5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Area`
--
ALTER TABLE `Area`
  ADD PRIMARY KEY (`codigoArea`);

--
-- Indexes for table `Cargo`
--
ALTER TABLE `Cargo`
  ADD PRIMARY KEY (`codigoCargo`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD KEY `FKcodigoTelefone` (`codigoFKTelefone`),
  ADD KEY `FKcodigoEndereco` (`codigoFKEndereco`);

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
-- Indexes for table `Projeto`
--
ALTER TABLE `Projeto`
  ADD PRIMARY KEY (`codigoProjeto`),
  ADD KEY `FKcodigoCliente` (`codigoFKCliente`);

--
-- Indexes for table `ProjetoSocio`
--
ALTER TABLE `ProjetoSocio`
  ADD PRIMARY KEY (`codigoProjSoc`),
  ADD KEY `FKcodigoCargoProjetoSocio` (`codigoFKCargo`),
  ADD KEY `FKcodigoProjeto` (`codigoFKProjeto`),
  ADD KEY `FKcodigoArea` (`codigoFKArea`);

--
-- Indexes for table `Socio`
--
ALTER TABLE `Socio`
  ADD PRIMARY KEY (`codigoSocio`),
  ADD KEY `FKcodigoTelefoneSocio` (`codigoFKtelefone`),
  ADD KEY `FKcodigoCargo` (`codigoFKCargo`),
  ADD KEY `FKcodigoLogin` (`codigoFKLogin`);

--
-- Indexes for table `Telefone`
--
ALTER TABLE `Telefone`
  ADD PRIMARY KEY (`codigoTelefone`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `FKcodigoEndereco` FOREIGN KEY (`codigoFKEndereco`) REFERENCES `Endereco` (`codigoEndereco`),
  ADD CONSTRAINT `FKcodigoTelefone` FOREIGN KEY (`codigoFKTelefone`) REFERENCES `Telefone` (`codigoTelefone`);

--
-- Limitadores para a tabela `Projeto`
--
ALTER TABLE `Projeto`
  ADD CONSTRAINT `FKcodigoCliente` FOREIGN KEY (`codigoFKCliente`) REFERENCES `Cliente` (`codigoCliente`);

--
-- Limitadores para a tabela `ProjetoSocio`
--
ALTER TABLE `ProjetoSocio`
  ADD CONSTRAINT `FKcodigoArea` FOREIGN KEY (`codigoFKArea`) REFERENCES `Area` (`codigoArea`),
  ADD CONSTRAINT `FKcodigoCargoProjetoSocio` FOREIGN KEY (`codigoFKCargo`) REFERENCES `Cargo` (`codigoCargo`),
  ADD CONSTRAINT `FKcodigoProjeto` FOREIGN KEY (`codigoFKProjeto`) REFERENCES `Projeto` (`codigoProjeto`);

--
-- Limitadores para a tabela `Socio`
--
ALTER TABLE `Socio`
  ADD CONSTRAINT `FKcodigoCargo` FOREIGN KEY (`codigoFKCargo`) REFERENCES `Cargo` (`codigoCargo`),
  ADD CONSTRAINT `FKcodigoLogin` FOREIGN KEY (`codigoFKLogin`) REFERENCES `Login` (`codigoLogin`),
  ADD CONSTRAINT `FKcodigoTelefoneSocio` FOREIGN KEY (`codigoFKtelefone`) REFERENCES `Telefone` (`codigoTelefone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
