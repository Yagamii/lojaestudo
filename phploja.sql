-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2016 às 04:33
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phploja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Jogos PS3'),
(5, 'Celular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mensagem` tinytext NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data_comentario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `mensagem`, `id_produto`, `data_comentario`) VALUES
(1, 7, 'teste', 3, '2016-08-08 11:55:30'),
(2, 7, 'teste2', 3, '2016-08-08 12:26:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE `nivel_usuario` (
  `id_nivel` int(11) NOT NULL,
  `nivel` char(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`id_nivel`, `nivel`) VALUES
(1, 'Comun'),
(2, 'Vendedor'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `valor` float(7,2) NOT NULL,
  `descricao` longtext NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `estoque` int(11) UNSIGNED NOT NULL,
  `promo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `valor`, `descricao`, `id_categoria`, `thumb`, `estoque`, `promo`) VALUES
(1, 'Assassins Creed Brotherhood', 100.00, 'Assassin''s Creed: Brotherhood', 1, 'teste.jpg', 8, 1),
(2, 'Smartphone Moto G 4 Dual Chip', 1299.00, 'Smartphone Moto G 4 Dual Chip Android 6.0 Tela 5.5'''' 16GB Camera 13MP - Preto', 5, '127115083_1GG.jpg', 0, 0),
(3, 'Assassins Creed Rogue', 120.00, 'Durante a jornada de Shay para perseguir e eliminar a Irmandade, vocÃª viajarÃ¡ para alÃ©m das colÃ´nias e do AtlÃ¢ntico Norte.', 1, '59830_index_gg.jpg', 7, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` char(15) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `data_registro` datetime NOT NULL,
  `id_nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `usuario`, `email`, `pass`, `data_registro`, `id_nivel`) VALUES
(2, 'Teste', 'Teste', 'teste', 'teste@teste.com', 'aa1bf4646de67fd9086cf6c79007026c', '2016-06-23 22:28:20', 3),
(4, 'Kenzo', 'Yagamii', 'kenzoyagamii', 'kenzo@teste.com', 'aa1bf4646de67fd9086cf6c79007026c', '2016-07-14 21:31:14', 3),
(7, 'Teste', 'Testinho', 'teste2', 'teste2@teste.com', 'aa1bf4646de67fd9086cf6c79007026c', '2016-08-01 21:12:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`,`id_produto`);

--
-- Indexes for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
