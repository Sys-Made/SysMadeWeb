-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 07-Dez-2020 às 20:01
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
-- Estrutura da tabela `CLIENTE`
--

CREATE TABLE `CLIENTE` (
  `CODIGOCLIENTE` int(11) NOT NULL,
  `CPFCLIENTE` varchar(14) DEFAULT NULL,
  `CNPJCLIENTE` varchar(20) DEFAULT NULL,
  `EMAILCLIENTE` varchar(200) DEFAULT NULL,
  `EMPRESACLIENTE` varchar(200) DEFAULT NULL,
  `NOMECLIENTE` varchar(150) DEFAULT NULL,
  `CODIGOFKSLOGIN` int(11) DEFAULT NULL,
  `CODIGOFKSENDERECO` int(11) DEFAULT NULL,
  `CODIGOFKSTELEFONE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CLIENTE`
--

INSERT INTO `CLIENTE` (`CODIGOCLIENTE`, `CPFCLIENTE`, `CNPJCLIENTE`, `EMAILCLIENTE`, `EMPRESACLIENTE`, `NOMECLIENTE`, `CODIGOFKSLOGIN`, `CODIGOFKSENDERECO`, `CODIGOFKSTELEFONE`) VALUES
(1, '234.567.890-11', '12.456.789/4561-00', 'CARLOS@CARLOS.COM', 'Microsolft', 'Carlos Santana', 1, 1, 1),
(2, '456.789.123-00', '12.456.789/4561-00', 'anaoffice@gmail.COM', 'Ubsolft', 'Ana juliana Satana', 2, 2, 2),
(3, '123.654.987-89', '12.365.984/8547-89', NULL, 'Cartando Estacio', 'Patric Alison', 3, 6, 3),
(4, '456.258.753-89', '14.222.454/7895-01', NULL, 'AutoCar', 'Junior Soares', 4, 7, 4),
(5, '514.568.658-89', '12.365.984/8457-89', NULL, 'AutoCar', 'Julio Santana', 5, 8, 5),
(6, '111.222.111-56', '12.365.984/8547-89', NULL, 'Cartando Estacio', 'Francisco Santana', 6, 9, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ENDERECO`
--

CREATE TABLE `ENDERECO` (
  `CODIGOENDERECO` int(11) NOT NULL,
  `RUA` varchar(110) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(100) DEFAULT NULL,
  `ESTADO` varchar(110) DEFAULT NULL,
  `CEP` varchar(100) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ENDERECO`
--

INSERT INTO `ENDERECO` (`CODIGOENDERECO`, `RUA`, `BAIRRO`, `CIDADE`, `ESTADO`, `CEP`, `UF`) VALUES
(1, 'Rua renato consorte 14', 'Pirituba', 'São Paulo', 'São Paulo', '01236-789', 'sp'),
(2, 'Rua renato coração 14', 'zona nova', 'São Paulo', 'São Paulo', '04236-789', 'sp'),
(6, 'Rua Renato Consorte 14', 'pirituba', '05164135', 'Sao Paulo', 'sao paulo', 'sp'),
(7, 'ConseiÃ§Ã£o de assias 20', 'tatuapÃ©', '12360-147', 'Sao Paulo', 'santo', 'sp'),
(8, 'Santa rua santana', 'pirituba', '00000-456', 'Sao Paulo', 'Florida', 'FD'),
(9, 'ConseiÃ§Ã£o de assias 20', 'tatuapÃ©', '00000-564', 'Sao Paulo', 'sao paulo', 'sp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `LOGIN`
--

CREATE TABLE `LOGIN` (
  `CODIGOLOGIN` int(11) NOT NULL,
  `LOGINUSER` varchar(120) DEFAULT NULL,
  `SENHASOCIO` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `LOGIN`
--

INSERT INTO `LOGIN` (`CODIGOLOGIN`, `LOGINUSER`, `SENHASOCIO`) VALUES
(1, 'Carlos023', '12345678910'),
(2, 'Anazinha023', '0123456789'),
(3, 'Dark_alisson', '123456'),
(4, 'JuniorSantos', '159357'),
(5, 'julinhoPortugal', '147852'),
(6, 'fran23', '159357');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PEDIDO`
--

CREATE TABLE `PEDIDO` (
  `CODIGOPEDIDO` int(11) NOT NULL,
  `CODIGOFKSCLIENTE` int(11) DEFAULT NULL,
  `NOMEDOPEDIDO` varchar(130) DEFAULT NULL,
  `RESPOSTADOPEDIDO` char(4) DEFAULT NULL,
  `DESCRICAOPEDIDO` varchar(500) DEFAULT NULL,
  `DATAREALIZADO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `PEDIDO`
--

INSERT INTO `PEDIDO` (`CODIGOPEDIDO`, `CODIGOFKSCLIENTE`, `NOMEDOPEDIDO`, `RESPOSTADOPEDIDO`, `DESCRICAOPEDIDO`, `DATAREALIZADO`) VALUES
(1, 1, 'BEM estar familia', NULL, 'gostaria de um sistema web para despositar e exibir projeto fitness', NULL),
(2, 2, 'Patric Alison', NULL, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', NULL),
(3, 2, 'Dieta Maxima', NULL, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60', '2020-12-03'),
(4, 2, 'Curso online', NULL, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60.', '2020-12-03'),
(5, 1, 'Curso em video', NULL, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset.', '2020-12-04'),
(6, 1, 'Saraiva 2020', NULL, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo', '2020-12-07'),
(7, 5, 'Play Site', NULL, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 ', '2020-12-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TELEFONE`
--

CREATE TABLE `TELEFONE` (
  `CODIGOTELEFONE` int(11) NOT NULL,
  `TELEFONE1` varchar(25) DEFAULT NULL,
  `TELEFONE2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `TELEFONE`
--

INSERT INTO `TELEFONE` (`CODIGOTELEFONE`, `TELEFONE1`, `TELEFONE2`) VALUES
(1, '(11) 98745-7894', '(11) 4000-5000'),
(2, '(11) 95949-5000', '(11) 3698-5289'),
(3, '11922420301', NULL),
(4, '(11) 3904-5632', NULL),
(5, '11922420301', NULL),
(6, '11922420301', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`CODIGOCLIENTE`),
  ADD KEY `FK_CODIGOLOGIN` (`CODIGOFKSLOGIN`),
  ADD KEY `FK_CODIGOTELEFONE` (`CODIGOFKSTELEFONE`),
  ADD KEY `FK_CODIGOENDERECO` (`CODIGOFKSENDERECO`);

--
-- Indexes for table `ENDERECO`
--
ALTER TABLE `ENDERECO`
  ADD PRIMARY KEY (`CODIGOENDERECO`);

--
-- Indexes for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD PRIMARY KEY (`CODIGOLOGIN`);

--
-- Indexes for table `PEDIDO`
--
ALTER TABLE `PEDIDO`
  ADD PRIMARY KEY (`CODIGOPEDIDO`),
  ADD KEY `FKS_CLIENTEPEDIDO` (`CODIGOFKSCLIENTE`);

--
-- Indexes for table `TELEFONE`
--
ALTER TABLE `TELEFONE`
  ADD PRIMARY KEY (`CODIGOTELEFONE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CLIENTE`
--
ALTER TABLE `CLIENTE`
  MODIFY `CODIGOCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ENDERECO`
--
ALTER TABLE `ENDERECO`
  MODIFY `CODIGOENDERECO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `LOGIN`
--
ALTER TABLE `LOGIN`
  MODIFY `CODIGOLOGIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `PEDIDO`
--
ALTER TABLE `PEDIDO`
  MODIFY `CODIGOPEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `TELEFONE`
--
ALTER TABLE `TELEFONE`
  MODIFY `CODIGOTELEFONE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD CONSTRAINT `FK_CODIGOENDERECO` FOREIGN KEY (`CODIGOFKSENDERECO`) REFERENCES `ENDERECO` (`CODIGOENDERECO`),
  ADD CONSTRAINT `FK_CODIGOLOGIN` FOREIGN KEY (`CODIGOFKSLOGIN`) REFERENCES `LOGIN` (`CODIGOLOGIN`),
  ADD CONSTRAINT `FK_CODIGOTELEFONE` FOREIGN KEY (`CODIGOFKSTELEFONE`) REFERENCES `TELEFONE` (`CODIGOTELEFONE`);

--
-- Limitadores para a tabela `PEDIDO`
--
ALTER TABLE `PEDIDO`
  ADD CONSTRAINT `FKS_CLIENTEPEDIDO` FOREIGN KEY (`CODIGOFKSCLIENTE`) REFERENCES `CLIENTE` (`CODIGOCLIENTE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
