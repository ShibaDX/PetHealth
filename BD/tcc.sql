-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2023 às 04:06
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
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
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
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `status`, `nome`, `telefone`, `email`, `dataNascimento`, `dataAdmissao`, `senha`, `cpf`, `dataDemissao`) VALUES
(1, 'Ativo', 'Admin', '', 'admin@adm.com', '2023-11-01', '2023-11-30', '1234', '', NULL);

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendente`
--

CREATE TABLE `atendente` (
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
-- Despejando dados para a tabela `atendente`
--

INSERT INTO `atendente` (`id`, `status`, `nome`, `telefone`, `email`, `dataNascimento`, `dataAdmissao`, `senha`, `cpf`, `dataDemissao`) VALUES
(1, '', 'Paulo', '(44) 99718-3800', 'abcde@gmail.com', '2023-11-08', '2023-11-30', '1234567', '082.423.899-00', NULL);

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
(7, '', 'Mel', '', 2018, 'Fêmea', 'Caramelo', '', 5, 6),
(25, '', 'Rex', 'Cachorro', 0, 'Selecione', '', '', 2, 5),
(26, '', 'Rex', 'Cachorro', 0, 'Selecione', '', '', 2, 28),
(27, '', 'Rex', 'Cachorro', 2020, 'Macho', 'Preto', '', 3, 1),
(28, '', 'Rex', 'Cachorro', 2020, 'Macho', 'Preto', '', 6, 5),
(39, '', 'Rex', 'Cachorro', 2020, 'Macho', 'Preto', '', 5, 7),
(40, '', 'Thor', 'Cachorro', 2020, 'Macho', 'Preto', '', 5, 2),
(41, '', 'Thor', 'Cachorro', 2020, 'Selecione', 'Preto', '', 5, 18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` double(11,2) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `status`, `nome`, `valor`, `categoria`) VALUES
(2, '', 'Consulta Veterinária de Rotina', 50.35, ''),
(3, '', 'Vacinação Anual', 30.00, ''),
(4, '', 'Castração/esterilização', 150.00, ''),
(5, '', 'Exame de Sangue', 80.00, ''),
(6, '', 'Radiografia ', 100.00, ''),
(7, '', 'Limpeza Dentária', 70.00, ''),
(8, '', 'Tratamento para Pulgas e Carrapatos', 40.00, ''),
(9, '', 'Microchipagem', 25.00, ''),
(10, '', 'Consulta de Emergência', 80.20, ''),
(11, '', 'Ultrassonografia ', 120.00, ''),
(12, '', 'Tratamento para Verminoses', 20.00, ''),
(13, '', 'Análise de Fezes', 25.00, ''),
(14, '', 'Fisioterapia para Animais', 60.00, ''),
(15, '', 'Acompanhamento de Gravidez', 90.00, ''),
(17, '', '', -292.00, ''),
(18, '', '', 0.00, ''),
(19, '', '', 0.00, ''),
(20, '', '', 0.00, '');

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
(32, '', 'Himalaio', ' ', 'Gato'),
(33, '', 'Teste', ' ', 'Roedor');

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
  `dataAdmissao` date NOT NULL DEFAULT current_timestamp(),
  `senha` varchar(200) NOT NULL,
  `CRMV` varchar(50) NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`id`, `status`, `nome`, `telefone`, `email`, `dataNascimento`, `dataAdmissao`, `senha`, `CRMV`, `dataDemissao`) VALUES
(2, '', 'Maria da Silva', '(11) 98765-4321', 'maria.silva@email.com', '1985-03-15', '2023-09-15', 'maria123', '12345-SP', NULL),
(3, '', 'João dos Santos', '(21) 99999-8888', 'joao.santos@email.com', '1990-07-10', '2023-09-15', 'joao123', '67890-RJ', NULL),
(4, '', 'Ana Oliveira', '(31) 5555-1234', 'ana.oliveira@email.com', '1982-09-25', '2023-09-15', 'ana123', '54321-MG', NULL),
(5, '', 'Pedro Pereira', '(41) 7777-5555', 'pedro.pereira@email.com', '1978-12-05', '2023-09-15', 'pedro123', '98765-PR', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
