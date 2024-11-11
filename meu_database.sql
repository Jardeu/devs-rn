SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criar usuário
CREATE USER 'test_user'@'localhost' IDENTIFIED BY 'test_pass123';

-- Conceder privilégios ao usuário no banco desafio_xneo
GRANT ALL PRIVILEGES ON devs_rn.* TO 'test_user'@'localhost';

-- Atualizar as permissões
FLUSH PRIVILEGES;

DROP DATABASE IF EXISTS `devs_rn`;

--
-- Banco de dados: `devs_rn`
CREATE DATABASE devs_rn;
--

USE devs_rn;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuidade`
--

CREATE TABLE `anuidade` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ano` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado`
--

CREATE TABLE `associado` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `cpf` varchar(11) UNIQUE NOT NULL,
  `data_filiacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `associado_id` int(11) UNSIGNED NOT NULL,
  `anuidade_id` int(11) UNSIGNED NOT NULL,
  `pago` boolean DEFAULT FALSE,
  FOREIGN KEY (associado_id) REFERENCES associado(id),
  FOREIGN KEY (anuidade_id) REFERENCES anuidade(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;