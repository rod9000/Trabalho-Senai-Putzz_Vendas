-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto_real
CREATE DATABASE IF NOT EXISTS `putzz_vendas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `putzz_vendas`;

CREATE TABLE usuarios (
idusuarios int(10) not null primary key auto_increment,
login varchar(50) not null,
senha varchar(50) not null   
);

-- Copiando estrutura para tabela projeto_real.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL  AUTO_INCREMENT ,
  `renda` decimal(10,2) DEFAULT NULL,
  `credito` decimal(10,2) DEFAULT NULL,
  `fk_idpessoa` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_idpessoa` (`fk_idpessoa`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`fk_idpessoa`) REFERENCES `pessoas` (`idpessoas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.clientes: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`idcliente`, `renda`, `credito`, `fk_idpessoa`) VALUES
	(1, 3000.00, 2000.00, 21),
	(2, 1500.00, 500.00, 32),
	(3, 2300.00, 400.00, 31),
	(4, 1700.00, 600.00, 34),
	(5, 2000.00, 900.00, 15),
	(6, 1000.00, 200.00, 36),
	(7, 1040.00, 100.00, 17),
	(8, 2600.00, 400.00, 38),
	(9, 1800.00, 700.00, 39),
	(10, 2500.00, 300.00, 40);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_real.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedidos` int(11) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status_pedido` tinytext DEFAULT NULL,
  `fk_idcliente` int(11) NOT NULL,
  `fk_idvendedor` int(11) NOT NULL,
  PRIMARY KEY (`idpedidos`),
  KEY `fk_idcliente` (`fk_idcliente`),
  KEY `fk_idvendedor` (`fk_idvendedor`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`fk_idvendedor`) REFERENCES `vendedores` (`idvendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.pedidos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`idpedidos`, `data_pedido`, `valor`, `status_pedido`, `fk_idcliente`, `fk_idvendedor`) VALUES
	(7, '2020-04-17', 3.00, 'A', 2, 3),
	(8, '2020-05-10', 4.00, 'I', 1, 3),
	(9, '2020-06-15', 1.00, 'A', 4, 2),
	(10, '2020-07-07', 2.00, 'I', 2, 3),
	(11, '2020-08-27', 7.00, 'A', 2, 1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_real.pedidos_produtos
CREATE TABLE IF NOT EXISTS `pedidos_produtos` (
  `fk_pedidos_idpedidos` int(11) NOT NULL,
  `fk_produtos_idprodutos` int(11) NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.pedidos_produtos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_produtos` DISABLE KEYS */;
INSERT INTO `pedidos_produtos` (`fk_pedidos_idpedidos`, `fk_produtos_idprodutos`, `qtde`, `valor`) VALUES
	(2, 4, 5, 50),
	(2, 2, 3, 100),
	(2, 1, 1, 10),
	(1, 4, 5, 50),
	(1, 5, 2, 1000);
/*!40000 ALTER TABLE `pedidos_produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_real.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `idpessoas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `status_pessoas` tinytext NOT NULL,
  PRIMARY KEY (`idpessoas`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.pessoas: ~80 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` (`idpessoas`, `nome`, `cpf`, `status_pessoas`) VALUES
	(1, 'rodrigo selan', 2147483647, 'A'),
	(2, 'Mano Okada', 2147483647, 'A'),
	(3, 'Crabs sauro', 2147483647, 'A'),
	(4, 'Fafa de belem', 2147483647, 'A'),
	(5, 'Jhony do putzz', 2147483647, 'A'),
	(6, 'pedro', 2147483647, 'A'),
	(7, 'henrique', 2147483647, 'A'),
	(8, 'felipe', 2147483647, 'I'),
	(9, 'joão', 2147483647, 'A'),
	(10, 'lucas', 2147483647, 'A'),
	(11, 'rodrigo selan', 2147483647, 'A'),
	(12, 'Mano Okada', 2147483647, 'A'),
	(13, 'Crabs sauro', 2147483647, 'A'),
	(14, 'Fafa de belem', 2147483647, 'A'),
	(15, 'Jhony do putzz', 2147483647, 'A'),
	(16, 'pedro', 2147483647, 'A'),
	(17, 'henrique', 2147483647, 'A'),
	(18, 'felipe', 2147483647, 'I'),
	(19, 'joão', 2147483647, 'A'),
	(20, 'lucas', 2147483647, 'A'),
	(21, 'rodrigo selan', 1999999999, 'A'),
	(22, 'Mano Okada', 2147483647, 'A'),
	(23, 'Crabs sauro', 2147483647, 'A'),
	(24, 'Fafa de belem', 2147483647, 'A'),
	(25, 'Jhony do putzz', 1234567891, 'A'),
	(26, 'pedro', 1111111111, 'A'),
	(27, 'henrique', 1111111111, 'A'),
	(28, 'felipe', 2111111111, 'I'),
	(29, 'joão', 1111111112, 'A'),
	(30, 'lucas', 1111111111, 'A'),
	(31, 'rodrigo selan', 1999999999, 'A'),
	(32, 'Mano Okada', 2147483647, 'A'),
	(33, 'Crabs sauro', 2147483647, 'A'),
	(34, 'Fafa de belem', 2147483647, 'A'),
	(35, 'Jhony do putzz', 1234567891, 'A'),
	(36, 'pedro', 111111111, 'A'),
	(37, 'henrique', 111111111, 'A'),
	(38, 'felipe', 111111111, 'I'),
	(39, 'joão', 111111112, 'A'),
	(40, 'lucas', 111111111, 'A'),
	(41, 'rodrigo selan', 1999999999, 'A'),
	(42, 'Mano Okada', 2147483647, 'A'),
	(43, 'Crabs sauro', 2147483647, 'A'),
	(44, 'Fafa de belem', 2147483647, 'A'),
	(45, 'Jhony do putzz', 1234567891, 'A'),
	(46, 'pedro', 111111111, 'A'),
	(47, 'henrique', 111111111, 'A'),
	(48, 'felipe', 111111111, 'I'),
	(49, 'joão', 111111112, 'A'),
	(50, 'lucas', 111111111, 'A'),
	(51, 'rodrigo selan', 1999999999, 'A'),
	(52, 'Mano Okada', 789880889, 'A'),
	(53, 'Crabs sauro', 987886780, 'A'),
	(54, 'Fafa de belem', 789456123, 'A'),
	(55, 'Jhony do putzz', 1234567891, 'A'),
	(56, 'pedro', 111111111, 'A'),
	(57, 'henrique', 111111111, 'A'),
	(58, 'felipe', 111111111, 'I'),
	(59, 'joão', 111111112, 'A'),
	(60, 'lucas', 111111111, 'A'),
	(61, 'rodrigo selan', 1999999999, 'A'),
	(62, 'Mano Okada', 789880889, 'A'),
	(63, 'Crabs sauro', 987886780, 'A'),
	(64, 'Fafa de belem', 789456123, 'A'),
	(65, 'Jhony do putzz', 1234567891, 'A'),
	(66, 'pedro', 111111111, 'A'),
	(67, 'henrique', 111111111, 'A'),
	(68, 'felipe', 111111111, 'I'),
	(69, 'joão', 111111112, 'A'),
	(70, 'lucas', 111111111, 'A'),
	(71, 'rodrigo selan', 1999999999, 'A'),
	(72, 'Mano Okada', 789880889, 'A'),
	(73, 'Crabs sauro', 987886780, 'A'),
	(74, 'Fafa de belem', 789456123, 'A'),
	(75, 'Jhony do putzz', 1234567891, 'A'),
	(76, 'pedro', 111111111, 'A'),
	(77, 'henrique', 111111111, 'A'),
	(78, 'felipe', 111111111, 'I'),
	(79, 'joão', 111111112, 'A'),
	(80, 'lucas', 111111111, 'A');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_real.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `status_produto` tinytext DEFAULT NULL,
  PRIMARY KEY (`idprodutos`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.produtos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`idprodutos`, `descricao`, `estoque`, `valor`, `status_produto`) VALUES
	(1, 'colher', 100, 10, 'A'),
	(2, 'sopa', 1000, 30, 'A'),
	(3, 'toddy', 500, 20, 'I'),
	(4, 'pão integral', 10, 10, 'A'),
	(5, 'celular', 200, 1000, 'A'),
	(6, 'mussarela', 300, 40, 'A');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_real.vendedores
CREATE TABLE IF NOT EXISTS `vendedores` (
  `idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `salario` decimal(10,2) DEFAULT NULL,
  `fk_idpessoas` int(11) NOT NULL,
  PRIMARY KEY (`idvendedor`),
  KEY `fk_idpessoas` (`fk_idpessoas`),
  CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`fk_idpessoas`) REFERENCES `pessoas` (`idpessoas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela projeto_real.vendedores: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` (`idvendedor`, `salario`, `fk_idpessoas`) VALUES
	(1, 2400.00, 1),
	(2, 1534.00, 3),
	(3, 524241.00, 5),
	(4, 74733.00, 4),
	(5, 1233.00, 8),
	(6, 754.00, 2),
	(7, 1899.00, 6),
	(8, 543732.00, 7),
	(9, 21332.00, 9),
	(10, 500.00, 10);
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
