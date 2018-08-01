-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: projetofieb
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Cadastros`
--

DROP TABLE IF EXISTS `Cadastros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cadastros` (
  `idCadastro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Funcionario_idFuncionario` int(10) unsigned NOT NULL,
  `nome_func` varchar(45) DEFAULT NULL,
  `email_func` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT ' ',
  `senha` varchar(100) DEFAULT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  `origem` varchar(20) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `dtcadastro` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCadastro`),
  KEY `Cadastros_FKIndex1` (`Funcionario_idFuncionario`),
  CONSTRAINT `Cadastros_ibfk_1` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `Funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cadastros`
--

LOCK TABLES `Cadastros` WRITE;
/*!40000 ALTER TABLE `Cadastros` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cadastros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Casas`
--

DROP TABLE IF EXISTS `Casas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Casas` (
  `idCasas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_casa` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idCasas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Casas`
--

LOCK TABLES `Casas` WRITE;
/*!40000 ALTER TABLE `Casas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Casas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ciclo`
--

DROP TABLE IF EXISTS `Ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ciclo` (
  `idCiclo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL,
  PRIMARY KEY (`idCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ciclo`
--

LOCK TABLES `Ciclo` WRITE;
/*!40000 ALTER TABLE `Ciclo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Empresas`
--

DROP TABLE IF EXISTS `Empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empresas` (
  `idEmpresas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Sindicato_idSindicato` int(10) unsigned NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  `situacao_associacao` tinyint(1) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `regiao_estado` varchar(20) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idEmpresas`),
  KEY `Empresas_FKIndex1` (`Sindicato_idSindicato`),
  CONSTRAINT `Empresas_ibfk_1` FOREIGN KEY (`Sindicato_idSindicato`) REFERENCES `Sindicato` (`idSindicato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empresas`
--

LOCK TABLES `Empresas` WRITE;
/*!40000 ALTER TABLE `Empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Familia_prod`
--

DROP TABLE IF EXISTS `Familia_prod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Familia_prod` (
  `idFamilia_prod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Casas_idCasas` int(10) unsigned NOT NULL,
  `descricao_prod` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idFamilia_prod`),
  KEY `Familia_prod_FKIndex1` (`Casas_idCasas`),
  CONSTRAINT `Familia_prod_ibfk_1` FOREIGN KEY (`Casas_idCasas`) REFERENCES `Casas` (`idCasas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Familia_prod`
--

LOCK TABLES `Familia_prod` WRITE;
/*!40000 ALTER TABLE `Familia_prod` DISABLE KEYS */;
/*!40000 ALTER TABLE `Familia_prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Funcionario`
--

DROP TABLE IF EXISTS `Funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Funcionario` (
  `idFuncionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(100) DEFAULT NULL,
  `rg_func` varchar(25) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT ' ',
  `senha` varchar(130) DEFAULT NULL,
  `nivel_acesso` int(10) unsigned DEFAULT NULL,
  `origem` varchar(20) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFuncionario`),
  UNIQUE KEY `rg_func` (`rg_func`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Funcionario`
--

LOCK TABLES `Funcionario` WRITE;
/*!40000 ALTER TABLE `Funcionario` DISABLE KEYS */;
INSERT INTO `Funcionario` VALUES (1,'Carlos Silveira','1434098750','pedrophbc@live.com',' 718452313','admin',1,'FIEB','Gerente'),(2,'Joao','14348745647','admin@gmail.com',' 985456212','admin2',2,'SESI','Diretor'),(3,'Paulo Tarso','14348745687','paulodetarso@gmail.com',' 87895453','admin3',3,'SINDVEST','Executivo');
/*!40000 ALTER TABLE `Funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sindicato`
--

DROP TABLE IF EXISTS `Sindicato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sindicato` (
  `idSindicato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_sindicato` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSindicato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sindicato`
--

LOCK TABLES `Sindicato` WRITE;
/*!40000 ALTER TABLE `Sindicato` DISABLE KEYS */;
/*!40000 ALTER TABLE `Sindicato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visita`
--

DROP TABLE IF EXISTS `Visita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visita` (
  `idVisita` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Casas_idCasas` int(10) unsigned NOT NULL,
  `Ciclo_idCiclo` int(10) unsigned NOT NULL,
  `Empresas_idEmpresas` int(10) unsigned NOT NULL,
  `data_agendada` date DEFAULT NULL,
  `status_visita` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`idVisita`),
  KEY `Visita_FKIndex1` (`Empresas_idEmpresas`),
  KEY `Visita_FKIndex2` (`Ciclo_idCiclo`),
  KEY `Visita_FKIndex3` (`Casas_idCasas`),
  CONSTRAINT `Visita_ibfk_1` FOREIGN KEY (`Empresas_idEmpresas`) REFERENCES `Empresas` (`idEmpresas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Visita_ibfk_2` FOREIGN KEY (`Ciclo_idCiclo`) REFERENCES `Ciclo` (`idCiclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Visita_ibfk_3` FOREIGN KEY (`Casas_idCasas`) REFERENCES `Casas` (`idCasas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visita`
--

LOCK TABLES `Visita` WRITE;
/*!40000 ALTER TABLE `Visita` DISABLE KEYS */;
/*!40000 ALTER TABLE `Visita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visita_has_Funcionario`
--

DROP TABLE IF EXISTS `Visita_has_Funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visita_has_Funcionario` (
  `Visita_idVisita` int(10) unsigned NOT NULL,
  `Funcionario_idFuncionario` int(10) unsigned NOT NULL,
  `Familia_prod_idFamilia_prod` int(10) unsigned NOT NULL,
  `data_realizacao` date DEFAULT NULL,
  `demanda_ident` varchar(20) DEFAULT NULL,
  `status_negociacao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Visita_idVisita`,`Funcionario_idFuncionario`),
  KEY `Visita_has_Funcionario_FKIndex1` (`Visita_idVisita`),
  KEY `Visita_has_Funcionario_FKIndex2` (`Funcionario_idFuncionario`),
  KEY `Visita_has_Funcionario_FKIndex3` (`Familia_prod_idFamilia_prod`),
  CONSTRAINT `Visita_has_Funcionario_ibfk_1` FOREIGN KEY (`Visita_idVisita`) REFERENCES `Visita` (`idVisita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Visita_has_Funcionario_ibfk_2` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `Funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Visita_has_Funcionario_ibfk_3` FOREIGN KEY (`Familia_prod_idFamilia_prod`) REFERENCES `Familia_prod` (`idFamilia_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visita_has_Funcionario`
--

LOCK TABLES `Visita_has_Funcionario` WRITE;
/*!40000 ALTER TABLE `Visita_has_Funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Visita_has_Funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_logs`
--

DROP TABLE IF EXISTS `funcionario_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_logs` (
  `idlog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Funcionario_idFuncionario` int(10) unsigned NOT NULL,
  `deslog` varchar(150) DEFAULT NULL,
  `desip` varchar(45) DEFAULT NULL,
  `desuseragent` varchar(130) DEFAULT NULL,
  `desessionid` varchar(80) DEFAULT NULL,
  `desurl` varchar(130) DEFAULT NULL,
  `dtregister` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idlog`),
  KEY `funcionario_logs_FKIndex1` (`Funcionario_idFuncionario`),
  CONSTRAINT `funcionario_logs_ibfk_1` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `Funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_logs`
--

LOCK TABLES `funcionario_logs` WRITE;
/*!40000 ALTER TABLE `funcionario_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_recoveries`
--

DROP TABLE IF EXISTS `funcionario_recoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_recoveries` (
  `idrecoverie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Funcionario_idFuncionario` int(10) unsigned NOT NULL,
  `desip` int(55) unsigned DEFAULT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idrecoverie`),
  KEY `funcionario_recoveries_FKIndex1` (`Funcionario_idFuncionario`),
  CONSTRAINT `funcionario_recoveries_ibfk_1` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `Funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_recoveries`
--

LOCK TABLES `funcionario_recoveries` WRITE;
/*!40000 ALTER TABLE `funcionario_recoveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_recoveries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-03 23:23:00
