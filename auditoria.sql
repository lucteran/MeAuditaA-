SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS usuario(
  idusuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  cpf VARCHAR(14) NOT NULL,
  email VARCHAR(40) NOT NULL,
  telefone VARCHAR(14),
  sexo CHAR NOT NULL,
  senha VARCHAR(72) NOT NULL,
  ativo BIT NOT NULL DEFAULT 0,
  chave_autenticacao VARCHAR(32) NOT NULL,
  tentativa INTEGER UNSIGNED NULL DEFAULT 0,
  cnpj VARCHAR(19),
  tipo_usuario CHAR(1) NOT NULL
);

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `email`, `telefone`, `sexo`, `senha`, `tipo_usuario`, `ativo`, `chave_autenticacao`, `tentativa`) VALUES
(1, 'Luciano arruda teran', '017.415.652-94', '2011luciano2011@gmail.com', '(91)98129-5160', 'M', 'c3f2ba930b4edda2d40db68e5bc51435c89351829af63e2f0a5deec564c4493561d3a189', 'A', b'1', '', 0),
(2, 'raonner bruno rodrigues dos santos', '032.432.621-95', 'brunoraonner@gmail.com', '(91)98155-5169', 'M', 'c3f2ba930b4edda2d40db68e5bc51435c89351829af63e2f0a5deec564c4493561d3a189', 'A', b'0', '', 0);

CREATE TABLE IF NOT EXISTS endereco_usuario (
  idendereco_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario_idusuario INTEGER UNSIGNED NOT NULL,
  logradouro VARCHAR(35) NOT NULL,
  numero INT NOT NULL,
  cep VARCHAR(9) NULL,
  complemento VARCHAR(50) NULL,
  bairro VARCHAR(35) NOT NULL,
  cidade VARCHAR(35) NOT NULL,
  uf CHAR(2) NOT NULL,
  PRIMARY KEY(idendereco_usuario),
  INDEX endereco_usuario_FKIndex1(usuario_idusuario)
);
CREATE TABLE IF NOT EXISTS auditoria (
  idauditoria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario_idusuario INTEGER UNSIGNED NOT NULL,
  id_auditor INTEGER UNSIGNED NULL,
  data_auditoria TIMESTAMP NULL,
  status_auditoria TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY(idauditoria),
  INDEX auditoria_FKIndex1(usuario_idusuario)
);

alter table `auditoria` ADD COLUMN solucao bit DEFAULT 0;

CREATE TABLE IF NOT EXISTS categoria_vulnerabilidade (
  idcategoria_vulnerabilidade INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  descricao TEXT,
  posicao INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idcategoria_vulnerabilidade)
);

CREATE TABLE IF NOT EXISTS avaliacao (
  idavaliacao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  categoria_vulnerabilidade_idcategoria_vulnerabilidade INTEGER UNSIGNED NOT NULL,
  auditoria_idauditoria INTEGER UNSIGNED NOT NULL,
  titulo VARCHAR(50) NULL,
  data_avaliacao TIMESTAMP NULL,
  site VARCHAR(30) NOT NULL,
  url_vulnerabilidade VARCHAR(255),
  nivel TINYINT UNSIGNED NULL,
  descricao TEXT,
  PRIMARY KEY(idavaliacao, categoria_vulnerabilidade_idcategoria_vulnerabilidade, auditoria_idauditoria),
  INDEX avaliacao_FKIndex1(categoria_vulnerabilidade_idcategoria_vulnerabilidade),
  INDEX avaliacao_FKIndex2(auditoria_idauditoria)
);