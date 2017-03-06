-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `projetoeduzz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tconhecimento`
--

CREATE TABLE IF NOT EXISTS `tconhecimento` (
  `con_cod` int(5) NOT NULL,
  `con_nome` text NOT NULL,
  PRIMARY KEY (`con_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cadastro de Conhecimento';

--
-- Extraindo dados da tabela `tconhecimento`
--

INSERT INTO `tconhecimento` (`con_cod`, `con_nome`) VALUES
(1, 'Desenvolvimento PHP'),
(2, 'Desenvolvimento Java'),
(3, 'Desenvolvimento Ruby'),
(4, 'UML'),
(5, 'Análise'),
(6, 'Scrum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tfuncionalidades`
--

CREATE TABLE IF NOT EXISTS `tfuncionalidades` (
  `fun_cod` int(5) NOT NULL AUTO_INCREMENT,
  `prj_cod` int(5) NOT NULL,
  `rec_cod` int(5) NOT NULL,
  `fun_nome` text NOT NULL,
  `fun_descricao` text NOT NULL,
  `fun_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fun_cod_status` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fun_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Funcionalidades a serem desenvolvidas' AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tfuncionalidades`
--

INSERT INTO `tfuncionalidades` (`fun_cod`, `prj_cod`, `rec_cod`, `fun_nome`, `fun_descricao`, `fun_data`, `fun_cod_status`) VALUES
(1, 1, 1, 'Cadastro Projeto', 'Permite Cadastrar o Projeto', '2017-03-04 16:52:45', 1),
(2, 1, 1, 'Cadastro Funcionalidades', 'Permite Cadastrar a Funcionalidade', '2017-03-04 16:54:21', 1),
(3, 1, 1, 'Cadastro Conhecimento', 'Permite Cadastrar o Conhecimento', '2017-03-04 16:54:21', 1),
(4, 1, 1, 'Cadastro Recurso', 'Permite Cadastrar o Recurso', '2017-03-04 16:54:21', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tprojetos`
--

CREATE TABLE IF NOT EXISTS `tprojetos` (
  `prj_cod` int(5) NOT NULL AUTO_INCREMENT,
  `prj_nome` text NOT NULL,
  `prj_descricao` text NOT NULL,
  `prj_deleted` int(1) NOT NULL DEFAULT '1' COMMENT '1 - Disp / 0 - Não Disp',
  PRIMARY KEY (`prj_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cadastro de Projetos' AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tprojetos`
--

INSERT INTO `tprojetos` (`prj_cod`, `prj_nome`, `prj_descricao`, `prj_deleted`) VALUES
(1, 'Gestão Projetos', 'Ferramenta Gestão Projetos', 1),
(2, 'Gestão Pessoas', 'Ferramenta Gestão Pessoas', 1),
(3, 'Gestão Obras', 'Ferramenta Gestão Obras', 1),
(4, 'Gestão Conhecimento', 'Ferramenta Gestão Conhecimento', 1),
(5, 'Gestão Fornecedores', 'Ferramenta Gestão Fornecedores', 1),
(6, 'Gestão Partes Interessadas', 'Ferramenta Gestão Partes Interessadas', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tprojrec`
--

CREATE TABLE IF NOT EXISTS `tprojrec` (
  `prj_cod` int(5) NOT NULL,
  `rec_cod` int(5) NOT NULL,
  `data_inc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prj_cod`,`rec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacionamento Projeto e Recurso';

--
-- Extraindo dados da tabela `tprojrec`
--

INSERT INTO `tprojrec` (`prj_cod`, `rec_cod`, `data_inc`) VALUES
(1, 1, '2017-03-04 17:21:16'),
(1, 2, '2017-03-04 17:21:16'),
(2, 1, '2017-03-04 17:21:16'),
(2, 2, '2017-03-04 17:21:16'),
(3, 1, '2017-03-04 17:21:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treccon`
--

CREATE TABLE IF NOT EXISTS `treccon` (
  `con_cod` int(5) NOT NULL,
  `rec_cod` int(5) NOT NULL,
  `data_inc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`con_cod`,`rec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacionamento entre Recurso e Conhecimento';

--
-- Extraindo dados da tabela `treccon`
--

INSERT INTO `treccon` (`con_cod`, `rec_cod`, `data_inc`) VALUES
(1, 1, '2017-03-04 17:19:09'),
(1, 2, '2017-03-04 17:19:09'),
(2, 1, '2017-03-04 17:19:09'),
(2, 2, '2017-03-04 17:19:09'),
(3, 1, '2017-03-04 17:19:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trecursos`
--

CREATE TABLE IF NOT EXISTS `trecursos` (
  `rec_cod` int(5) NOT NULL AUTO_INCREMENT,
  `rec_nome` text NOT NULL,
  `rec_email` text NOT NULL,
  `rec_fone` text NOT NULL,
  `trec_cod` int(5) NOT NULL,
  PRIMARY KEY (`rec_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cadastro de Recuros' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `trecursos`
--

INSERT INTO `trecursos` (`rec_cod`, `rec_nome`, `rec_email`, `rec_fone`, `trec_cod`) VALUES
(1, 'Wladimir', 'wladi@gmail.com', '(15) 99999-9999', 2),
(2, 'Lucas', 'lucas@gmail.com', '(15) 99999-9999', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tstatusfuncionalidade`
--

CREATE TABLE IF NOT EXISTS `tstatusfuncionalidade` (
  `fun_cod_status` int(5) NOT NULL AUTO_INCREMENT,
  `fun_nome_status` text NOT NULL,
  PRIMARY KEY (`fun_cod_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cadastro do Status da Funcionalidade' AUTO_INCREMENT=100 ;

--
-- Extraindo dados da tabela `tstatusfuncionalidade`
--

INSERT INTO `tstatusfuncionalidade` (`fun_cod_status`, `fun_nome_status`) VALUES
(1, 'Protótipo'),
(2, 'Desenvolvimento'),
(3, 'Homologação'),
(4, 'Produção'),
(99, 'Descontinuada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ttiporec`
--

CREATE TABLE IF NOT EXISTS `ttiporec` (
  `trec_cod` int(5) NOT NULL AUTO_INCREMENT,
  `trec_nome` text NOT NULL,
  PRIMARY KEY (`trec_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cadastro de Tipo de Recuros' AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `ttiporec`
--

INSERT INTO `ttiporec` (`trec_cod`, `trec_nome`) VALUES
(1, 'Desenvolvedor'),
(2, 'Analista'),
(3, 'Tester'),
(4, 'StakeHolder'),
(5, 'Homologador');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
