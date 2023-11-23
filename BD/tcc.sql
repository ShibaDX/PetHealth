-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 01:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `data` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `obs` varchar(500) DEFAULT NULL,
  `resultado` varchar(200) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `veterinario_id` int(11) DEFAULT NULL,
  `procedimento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id`, `status`, `data`, `hora`, `obs`, `resultado`, `pet_id`, `veterinario_id`, `procedimento_id`) VALUES
(1, '', '2023-11-22', '17:00', ' ', NULL, 2, 10, 5),
(2, '', '2023-11-22', '14:00', ' ', NULL, 2, 10, 5),
(3, '', '2023-11-22', '17:00', ' ', NULL, 4, 7, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dataNascimento` varchar(50) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `dataCadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `status`, `nome`, `telefone`, `endereco`, `cidade`, `UF`, `sexo`, `dataNascimento`, `CPF`, `email`, `senha`, `dataCadastro`) VALUES
(2, 0, 'Ana Silva Oliveira', '(11) 98765-4321', 'Rua das Flores, 123', 'São Paulo', 'SP', 'F', '1980-05-11', '123.456.789-00', 'ana.silva@email.com', 'ana123', '2023-09-15'),
(3, 0, 'Marcos Santos Pereira', '(21) 99999-8888', 'Avenida Principal, 456', 'Rio de Janeiro', 'RJ', 'M', '1982-08-20', '987.654.321-00', 'marcos.santos@email.com', 'marcos123', '2023-09-15'),
(4, 0, 'Camila Alves Souza', '(31) 5555-1234', 'Rua das Palmeiras, 789', 'Belo Horizonte', 'MG', 'F', '1985-11-15', '456.789.123-00', 'camila.alves@email.com', 'camila123', '2023-09-15'),
(5, 0, 'Luiz Costa Lima', '(41) 7777-5555', 'Travessa das Pedras, 321', 'Curitiba', 'PR', 'M', '1977-04-03', '234.567.890-00', 'luiz.lima@email.com', 'luiz123', '2023-09-15'),
(6, 0, 'Marina Gonçalves Ribeiro', '(51) 3333-2222', 'Rua das Árvores, 987', 'Porto Alegre', 'RS', 'F', '1990-02-25', '345.678.901-00', 'marina.ribeiro@email.com', 'marina123', '2023-09-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `anoNascimento` int(11) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `obs` varchar(300) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `raca_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pet`
--

INSERT INTO `pet` (`id`, `status`, `nome`, `especie`, `anoNascimento`, `sexo`, `cor`, `obs`, `cliente_id`, `raca_id`) VALUES
(1, '', 'Juan', '', 2019, 'Macho', 'Caramelo', '', 5, 2),
(2, '', 'Bella', '', 2018, 'Fêmea', 'Marrom e branco', '', 2, 5),
(3, '', 'Max', '', 2016, 'Macho', 'Preto', '', 3, 10),
(4, '', 'Luna', '', 2019, 'Fêmea', 'Cinza e rajado', '', 4, 11),
(5, '', 'Rocky', '', 2015, 'Macho', 'Dourado', '', 6, 14),
(6, '', 'Sophie', '', 2020, 'Fêmea', 'Creme', '', 6, 5),
(7, '', 'Mel', '', 2018, 'Fêmea', 'Caramelo', '', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `status`, `nome`, `valor`, `categoria`) VALUES
(2, '', 'Consulta Veterinária de Rotina', 50, ''),
(3, '', 'Vacinação Anual', 30, ''),
(4, '', 'Castração/esterilização', 150, ''),
(5, '', 'Exame de Sangue', 80, ''),
(6, '', 'Radiografia ', 100, ''),
(7, '', 'Limpeza Dentária', 70, ''),
(8, '', 'Tratamento para Pulgas e Carrapatos', 40, ''),
(9, '', 'Microchipagem', 25, ''),
(10, '', 'Consulta de Emergência', 80, ''),
(11, '', 'Ultrassonografia ', 120, ''),
(12, '', 'Tratamento para Verminoses', 20, ''),
(13, '', 'Análise de Fezes', 25, ''),
(14, '', 'Fisioterapia para Animais', 60, ''),
(15, '', 'Acompanhamento de Gravidez', 90, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `especie` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `raca`
--

INSERT INTO `raca` (`id`, `status`, `nome`, `descricao`, `especie`) VALUES
(1, '', 'Labrador Retriever', ' ', 'Cachorro'),
(2, '', 'Pastor Alemão', ' ', 'Cachorro'),
(3, '', 'Golden Retriever', ' ', 'Cachorro'),
(4, '', 'Bulldog Inglês', ' ', 'Cachorro'),
(5, '', 'Beagle', ' ', 'Cachorro'),
(6, '', 'Poodle', ' ', 'Cachorro'),
(7, '', 'Boxer', ' ', 'Cachorro'),
(8, '', 'Dachshund', ' ', 'Cachorro'),
(9, '', 'Chihuahua', ' ', 'Cachorro'),
(10, '', 'Shih Tzu', ' ', 'Cachorro'),
(11, '', 'Pug', ' ', 'Cachorro'),
(12, '', 'Yorkshire Terrier', ' ', 'Cachorro'),
(13, '', 'Rottweiler', ' ', 'Cachorro'),
(14, '', 'Doberman Pinscher', ' ', 'Cachorro'),
(15, '', 'Border Collie', ' ', 'Cachorro'),
(16, '', 'Schnauzer Miniatura', ' ', 'Cachorro'),
(17, '', 'Shetland Sheepdog', ' ', 'Cachorro'),
(18, '', 'Akita', ' ', 'Cachorro'),
(19, '', 'Husky Siberiano', ' ', 'Cachorro'),
(20, '', 'Bulldog Francês', ' ', 'Cachorro'),
(21, '', 'Cocker Spaniel', ' ', 'Cachorro'),
(22, '', 'Mastiff', ' ', 'Cachorro'),
(23, '', 'Dálmata', ' ', 'Cachorro'),
(24, '', 'Shiba Inu', ' ', 'Cachorro'),
(25, '', 'Sem Raça', ' ', 'Cachorro'),
(26, '', 'Siamês', ' ', 'Gato'),
(27, '', 'Persa', ' ', 'Gato'),
(28, '', 'Bengal', ' ', 'Gato'),
(29, '', 'Sphynx', ' ', 'Gato'),
(30, '', 'Birmanês', ' ', 'Gato'),
(31, '', 'Abissínio', ' ', 'Gato'),
(32, '', 'Himalaio', ' ', 'Gato');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recebimento`
--

CREATE TABLE `recebimento` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `data` datetime NOT NULL,
  `valorRecebido` double NOT NULL,
  `saldoReceber` double NOT NULL,
  `formaRecebimento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dataNascimento` date NOT NULL,
  `dataAdmissao` date DEFAULT current_timestamp(),
  `senha` varchar(200) NOT NULL,
  `CRMV` varchar(50) NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`id`, `status`, `nome`, `telefone`, `email`, `dataNascimento`, `dataAdmissao`, `senha`, `CRMV`, `dataDemissao`) VALUES
(1, '', 'Admin', '', 'admin@adm.com', '0000-00-00', '2023-09-01', '1234', '', NULL),
(6, '', 'Maria da Silva', '(11) 98765-4321', 'maria.silva@email.com', '1985-03-15', '2023-09-15', 'maria123', '12345-SP', NULL),
(7, '', 'João dos Santos', '(21) 99999-8888', 'joao.santos@email.com', '1990-07-10', '2023-09-15', 'joao123', '67890-RJ', NULL),
(8, '', 'Ana Oliveira', '(31) 5555-1234', 'ana.oliveira@email.com', '1982-09-25', '2023-09-15', 'ana123', '54321-MG', NULL),
(9, '', 'Pedro Pereira', '(41) 7777-5555', 'pedro.pereira@email.com', '1978-12-05', '2023-09-15', 'pedro123', '98765-PR', NULL),
(10, '', 'Laura Gonçalves', '(51) 3333-2222', 'laura.goncalves@email.com', '1995-01-20', '2023-09-15', 'laura123', '22222-RS', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_agenda` (`pet_id`),
  ADD KEY `fk_procedimento_agenda` (`procedimento_id`),
  ADD KEY `fk_veterinario_agenda` (`veterinario_id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_pet` (`cliente_id`),
  ADD KEY `fk_raca_pet` (`raca_id`);

--
-- Índices de tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_especie_raca` (`especie`);

--
-- Índices de tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_pet_agenda` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `fk_procedimento_agenda` FOREIGN KEY (`procedimento_id`) REFERENCES `procedimento` (`id`),
  ADD CONSTRAINT `fk_veterinario_agenda` FOREIGN KEY (`veterinario_id`) REFERENCES `veterinario` (`id`);

--
-- Restrições para tabelas `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_cliente_pet` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_raca_pet` FOREIGN KEY (`raca_id`) REFERENCES `raca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
