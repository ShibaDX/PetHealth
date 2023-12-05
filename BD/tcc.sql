-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 15:16
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
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dataNascimento` date NOT NULL,
  `dataAdmissao` date NOT NULL DEFAULT current_timestamp(),
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id`, `status`, `nome`, `telefone`, `email`, `dataNascimento`, `dataAdmissao`, `senha`, `cpf`, `dataDemissao`) VALUES
(1, 'Ativo', 'Admin', '', 'admin@adm.com', '2023-11-01', '2023-11-30', '1234', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `statusAgenda` varchar(20) NOT NULL,
  `data` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `obs` varchar(500) DEFAULT NULL,
  `resultado` varchar(500) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `veterinario_id` int(11) DEFAULT NULL,
  `procedimento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id`, `statusAgenda`, `data`, `hora`, `obs`, `resultado`, `pet_id`, `veterinario_id`, `procedimento_id`) VALUES
(1, 'Concluído', '2023-12-02', '09:30', '', 'asdas', 2, 4, 14),
(2, 'Em Andamento', '2023-12-13', '15:30', '', NULL, 7, 1, 12),
(3, 'Em Andamento', '2023-12-06', '16:00', '', NULL, 1, 2, 3),
(4, 'Inconcluido', '2023-12-02', '09:00', '', NULL, 7, 4, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendente`
--

CREATE TABLE `atendente` (
  `id` int(11) NOT NULL,
  `statusAtendente` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `dataNascimento` date NOT NULL,
  `dataAdmissao` date NOT NULL DEFAULT current_timestamp(),
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atendente`
--

INSERT INTO `atendente` (`id`, `statusAtendente`, `nome`, `telefone`, `email`, `sexo`, `dataNascimento`, `dataAdmissao`, `senha`, `cpf`, `dataDemissao`) VALUES
(1, 'Ativo', 'Paulo', '(44) 99718-3800', 'ae@gmail.com', 'M', '2023-11-08', '2023-11-30', '1234567', '093.933.938-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dataNascimento` varchar(50) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dataCadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `status`, `nome`, `telefone`, `endereco`, `cidade`, `UF`, `sexo`, `dataNascimento`, `CPF`, `email`, `dataCadastro`) VALUES
(2, 'Ativo', 'Ana Silva Oliveira', '(11) 98765-4321', 'Rua das Flores, 123', 'São Paulo', 'SP', 'F', '1980-05-11', '123.456.789-00', 'ana.silva@email.com', '2023-09-15'),
(3, 'Ativo', 'Marcos Santos Pereira', '(21) 99999-8888', 'Avenida Principal, 456', 'Rio de Janeiro', 'RJ', 'M', '1982-08-20', '987.654.321-00', 'marcos.santos@email.com', '2023-09-15'),
(4, 'Ativo', 'Camila Alves Souza', '(31) 5555-1234', 'Rua das Palmeiras, 789', 'Belo Horizonte', 'MG', 'F', '1985-11-15', '456.789.123-00', 'camila.alves@email.com', '2023-09-15'),
(5, 'Ativo', 'Luiz Costa Lima', '(41) 7777-5555', 'Travessa das Pedras, 321', 'Curitiba', 'PR', 'M', '1977-04-03', '234.567.890-00', 'luiz.lima@email.com', '2023-09-15'),
(6, 'Ativo', 'Marina Gonçalves Ribeiro', '(51) 3333-2222', 'Rua das Árvores, 987', 'Porto Alegre', 'RS', 'F', '1990-02-25', '345.678.901-00', 'marina.ribeiro@email.com', '2023-09-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `statusPet` varchar(10) NOT NULL,
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

INSERT INTO `pet` (`id`, `statusPet`, `nome`, `especie`, `anoNascimento`, `sexo`, `cor`, `obs`, `cliente_id`, `raca_id`) VALUES
(1, 'Ativo', 'Juan', 'Cachorro', 2019, 'Macho', 'Caramelo', '', 5, 2),
(2, 'Ativo', 'Bella', 'Gato', 2018, 'Fêmea', 'Marrom e branco', '', 2, 5),
(3, 'Ativo', 'Max', 'Cachorro', 2016, 'Macho', 'Preto', '', 3, 10),
(4, 'Ativo', 'Luna', 'Gato', 2019, 'Fêmea', 'Cinza e rajado', '', 4, 11),
(5, 'Ativo', 'Rocky', 'Cachorro', 2015, 'Macho', 'Dourado', '', 6, 14),
(6, 'Ativo', 'Sophie', 'Gato', 2020, 'Fêmea', 'Creme', '', 6, 5),
(7, 'Ativo', 'Mel', 'Gato', 2018, 'Fêmea', 'Caramelo', '', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `statusProcedimento` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `statusProcedimento`, `nome`, `valor`) VALUES
(2, 'Ativo', 'Consulta Veterinária de Rotina', 50.00),
(3, 'Ativo', 'Vacinação Anual', 35.00),
(4, 'Ativo', 'Castração/esterilização', 150.00),
(5, 'Ativo', 'Exame de Sangue', 80.00),
(6, 'Ativo', 'Radiografia ', 100.00),
(7, 'Ativo', 'Limpeza Dentária', 70.00),
(8, 'Ativo', 'Tratamento para Pulgas e Carrapatos', 40.00),
(9, 'Ativo', 'Microchipagem', 25.00),
(10, 'Ativo', 'Consulta de Emergência', 50.00),
(11, 'Ativo', 'Ultrassonografia ', 120.00),
(12, 'Ativo', 'Tratamento para Verminoses', 20.00),
(13, 'Ativo', 'Análise de Fezes', 25.00),
(14, 'Ativo', 'Fisioterapia para Animais', 60.00),
(15, 'Ativo', 'Acompanhamento de Gravidez', 90.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `id` int(11) NOT NULL,
  `statusRaca` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `especie` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `raca`
--

INSERT INTO `raca` (`id`, `statusRaca`, `nome`, `descricao`, `especie`) VALUES
(1, 'Ativo', 'Labrador Retriever', ' ', 'Cachorro'),
(2, 'Ativo', 'Pastor Alemão', ' ', 'Cachorro'),
(3, 'Ativo', 'Golden Retriever', ' ', 'Cachorro'),
(4, 'Ativo', 'Bulldog Inglês', ' ', 'Cachorro'),
(5, 'Ativo', 'Beagle', ' ', 'Cachorro'),
(6, 'Ativo', 'Poodle', ' ', 'Cachorro'),
(7, 'Ativo', 'Boxer', ' ', 'Cachorro'),
(8, 'Ativo', 'Dachshund', ' ', 'Cachorro'),
(9, 'Ativo', 'Chihuahua', ' ', 'Cachorro'),
(10, 'Ativo', 'Shih Tzu', ' ', 'Cachorro'),
(11, 'Ativo', 'Pug', ' ', 'Cachorro'),
(12, 'Ativo', 'Yorkshire Terrier', ' ', 'Cachorro'),
(13, 'Ativo', 'Rottweiler', ' ', 'Cachorro'),
(14, 'Ativo', 'Doberman Pinscher', ' ', 'Cachorro'),
(15, 'Ativo', 'Border Collie', ' ', 'Cachorro'),
(16, 'Ativo', 'Schnauzer Miniatura', ' ', 'Cachorro'),
(17, 'Ativo', 'Shetland Sheepdog', ' ', 'Cachorro'),
(18, 'Ativo', 'Akita', ' ', 'Cachorro'),
(19, 'Ativo', 'Husky Siberiano', ' ', 'Cachorro'),
(20, 'Ativo', 'Bulldog Francês', ' ', 'Cachorro'),
(21, 'Ativo', 'Cocker Spaniel', ' ', 'Cachorro'),
(22, 'Ativo', 'Mastiff', ' ', 'Cachorro'),
(23, 'Ativo', 'Dálmata', ' ', 'Cachorro'),
(24, 'Ativo', 'Shiba Inu', ' ', 'Cachorro'),
(25, 'Ativo', 'Sem Raça', ' ', 'Cachorro'),
(26, 'Ativo', 'Siamês', ' ', 'Gato'),
(27, 'Ativo', 'Persa', ' ', 'Gato'),
(28, 'Ativo', 'Bengal', ' ', 'Gato'),
(29, 'Ativo', 'Sphynx', ' ', 'Gato'),
(30, 'Ativo', 'Birmanês', ' ', 'Gato'),
(31, 'Ativo', 'Abissínio', ' ', 'Gato'),
(32, 'Ativo', 'Himalaio', ' ', 'Gato');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int(11) NOT NULL,
  `statusVet` varchar(10) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `dataNascimento` date NOT NULL,
  `dataAdmissao` date NOT NULL DEFAULT current_timestamp(),
  `senha` varchar(200) NOT NULL,
  `CRMV` varchar(50) NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`id`, `statusVet`, `nome`, `telefone`, `email`, `sexo`, `dataNascimento`, `dataAdmissao`, `senha`, `CRMV`, `dataDemissao`) VALUES
(1, 'Inativo', 'Paulo', '(44) 99718-3800', 'abcde@gmail.com', 'M', '2023-11-08', '2023-09-15', '1234567', '12456-PR', '2023-12-04'),
(2, 'Ativo', 'João dos Santos', '(65) 99854-3301', 'joao.santos@email.com', 'M', '1990-07-10', '2023-09-15', 'joao123', '67890-RJ', '0000-00-00'),
(3, 'Ativo', 'Ana Oliveira', ' (31) 5555-1234', 'ana.oliveira@email.com', 'F', '1982-09-25', '2023-09-15', 'ana123', '54321-MG', '0000-00-00'),
(4, 'Ativo', 'Pedro Pereira', '(41) 7777-5555', 'pedro.pereira@email.com', 'M', '1978-12-05', '2023-09-15', 'pedro123', '98765-PR', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_agenda` (`pet_id`),
  ADD KEY `fk_procedimento_agenda` (`procedimento_id`),
  ADD KEY `fk_veterinario_agenda` (`veterinario_id`);

--
-- Índices de tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
