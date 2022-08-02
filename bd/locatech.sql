-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Ago-2022 às 21:35
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locatech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aparelho`
--

CREATE TABLE `aparelho` (
  `id` int(11) NOT NULL,
  `modelo` char(45) NOT NULL,
  `especificacao` char(200) NOT NULL,
  `preco` float NOT NULL,
  `conservacao` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aparelho`
--

INSERT INTO `aparelho` (`id`, `modelo`, `especificacao`, `preco`, `conservacao`, `tipo`) VALUES
(1, 'iPhone 3G', 'test dos testes', 2133, 2, 0),
(2, 'iPhone', '3213122', 231, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `cpf` char(11) NOT NULL,
  `nome` char(45) NOT NULL,
  `endereco` char(45) NOT NULL,
  `nascimento` date NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`cpf`, `nome`, `endereco`, `nascimento`, `usuario_id`) VALUES
('12341241251', 'Joao Alvo', 'Rua 0', '2022-07-14', 3),
('21312312423', 'aaaaa', 'Rua 0', '0000-00-00', 4),
('312412412', '4421wwq', 'Qualquer rua', '2022-07-12', 6),
('3225525585', 'Joao Alvo', 'Rua 0', '1999-02-01', 2),
('33333333333', 'Yuri Barbosa', 'Rua 0', '1995-08-30', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iphone`
--

CREATE TABLE `iphone` (
  `imei` int(11) NOT NULL,
  `aparelho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locar`
--

CREATE TABLE `locar` (
  `formaPagament` char(30) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date DEFAULT NULL,
  `plano` int(11) NOT NULL,
  `cpf_cliente` char(11) NOT NULL,
  `id_aparelho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` char(35) NOT NULL,
  `senha` char(35) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `tipo`) VALUES
(1, 'yuri', '1234', 1),
(2, 'user1', '1234', 1),
(3, 'jpixel', '1234', 1),
(4, 'bobo', '1234', 1),
(5, 'unchain', '1234', 1),
(6, 'joao', '1234', 1),
(7, 'admin', '1234', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aparelho`
--
ALTER TABLE `aparelho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `iphone`
--
ALTER TABLE `iphone`
  ADD PRIMARY KEY (`imei`),
  ADD UNIQUE KEY `imei` (`imei`),
  ADD KEY `id_fk_aparelho` (`aparelho_id`);

--
-- Índices para tabela `locar`
--
ALTER TABLE `locar`
  ADD KEY `cpf_cliente` (`cpf_cliente`),
  ADD KEY `id_aparelho` (`id_aparelho`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aparelho`
--
ALTER TABLE `aparelho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `iphone`
--
ALTER TABLE `iphone`
  ADD CONSTRAINT `id_fk_aparelho` FOREIGN KEY (`aparelho_id`) REFERENCES `aparelho` (`id`);

--
-- Limitadores para a tabela `locar`
--
ALTER TABLE `locar`
  ADD CONSTRAINT `locar_ibfk_1` FOREIGN KEY (`cpf_cliente`) REFERENCES `client` (`cpf`),
  ADD CONSTRAINT `locar_ibfk_2` FOREIGN KEY (`id_aparelho`) REFERENCES `aparelho` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
