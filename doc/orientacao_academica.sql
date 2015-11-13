-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2015 às 03:28
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orientacao_academica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coordenador_pessoa_idx` (`id_pessoa`),
  KEY `fk_coordenador_curso_idx` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id`, `id_pessoa`, `id_curso`, `data_admissao`, `data_saida`) VALUES
(1, 3, 1, '2015-05-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'Sistemas de Informação'),
(2, 'Ciência da computação'),
(3, 'Licenciatura em computação'),
(4, 'Bacharelado interdisciplinar C&T'),
(5, 'Engenharia de computação'),
(6, 'Direito'),
(7, 'Medicina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_pessoa` int(11) NOT NULL COMMENT 'Responsável pelo departamnento',
  PRIMARY KEY (`id`),
  KEY `fk_departamento_pessoa_idx` (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `nome`, `id_pessoa`) VALUES
(3, 'Departamento de ciência da computação', 3),
(4, 'Departamento de estatística', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `carga` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_disciplina_departamento_idx` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `carga`, `codigo`, `id_departamento`) VALUES
(1, 'Laboratório de programação web', 51, 'MATC84', 3),
(2, 'Estruturas de dados', 68, 'MATD02', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL COMMENT 'Também serve como login da pessoa',
  `tipo` char(1) NOT NULL COMMENT 'A=Aluno, P=Professor',
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL COMMENT 'Se for aluno, preenche esse campo como sendo o curso do aluno.',
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_curso_idx` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `matricula`, `cpf`, `tipo`, `email`, `senha`, `id_curso`) VALUES
(1, 'Victor  de Azevedo Nunes', '210105641', '05769044578', 'A', 'victorazv@hotmail.com', '123456', 1),
(2, 'Ático', '123456789', '12345678912', 'A', 'atico@hotmail.com', NULL, 4),
(3, 'Ricardo Rios', '123132123132', '12312312312', 'P', 'ricardo@ufba.br', NULL, NULL),
(4, 'Patrícia Dourado', '121145784', '12332112321', 'P', 'patricia@ufba.br', NULL, NULL),
(7, '123', '213', '123123', 'A', '123312', NULL, NULL),
(10, 'asd', 'asdasd', 'asdasd', 'A', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE IF NOT EXISTS `solicitacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_coordenador` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `semestre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitacao_pessoa_idx` (`id_pessoa`),
  KEY `kf_solicitacao_coordenador_idx` (`id_coordenador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id`, `id_pessoa`, `id_coordenador`, `data`, `semestre`) VALUES
(1, 1, 1, '2015-10-22', '2015.1'),
(2, 2, NULL, '2015-10-26', '2015.1'),
(3, 1, NULL, '2015-10-25', '2015.1'),
(4, 3, NULL, '2015-10-25', '2015.1'),
(5, 4, NULL, '2015-10-25', '2015.1'),
(6, 7, NULL, '2015-10-25', '2015.1'),
(7, 2, NULL, '2015-10-25', '2015.1'),
(8, 2, NULL, '2015-10-25', '2015.1'),
(9, 1, NULL, '2015-10-25', '2015.1'),
(10, 1, NULL, '2015-10-25', '2015.1'),
(11, 10, NULL, '2015-10-25', '2015.1'),
(12, 1, NULL, '2015-10-27', '2015.1'),
(13, 4, NULL, '2015-10-25', '2015.1'),
(14, 2, NULL, '2015-10-27', '2015.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_disciplina`
--

CREATE TABLE IF NOT EXISTS `solicitacao_disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitacao` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_s_d_solicitacao_idx` (`id_solicitacao`),
  KEY `fk_s_d_disciplina_idx` (`id_disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `solicitacao_disciplina`
--

INSERT INTO `solicitacao_disciplina` (`id`, `id_solicitacao`, `id_disciplina`) VALUES
(4, 1, 2),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 2),
(9, 12, 1),
(11, 12, 2),
(14, 11, 1),
(15, 11, 2),
(16, 14, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coordenador_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_pessoa_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `fk_solicitacao_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kf_solicitacao_coordenador` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_disciplina`
--
ALTER TABLE `solicitacao_disciplina`
  ADD CONSTRAINT `fk_s_d_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_s_d_solicitacao` FOREIGN KEY (`id_solicitacao`) REFERENCES `solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
