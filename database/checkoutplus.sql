CREATE DATABASE  IF NOT EXISTS `checkoutplus` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `checkoutplus`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: checkoutplus
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (2,'MA','ADMIN','SISTEMA DE VENTAS',1,61);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `numdocumento` varchar(45) DEFAULT NULL,
  `estado` int NOT NULL,
  `idtipo_documento` int NOT NULL,
  `idtipo_cliente` int NOT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `idcomercio` (`idcomercio`),
  KEY `cliente_ibfk_1` (`idtipo_documento`),
  KEY `cliente_ibfk_2` (`idtipo_cliente`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`),
  CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`idtipo_cliente`) REFERENCES `tipo_cliente` (`idtipo_cliente`),
  CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,NULL,'MA','ADMIN','CALLE2','+573132311084',NULL,1,1,1,61);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `idcolor` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idcolor`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `color_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,NULL,'ADMIN','EFWEF',1,61),(2,NULL,'ADMIN','F1C4FF',1,61),(3,NULL,'ADMIN','00510E',1,61),(4,NULL,'ADMIN','3F8200',1,61),(5,NULL,'ADMIN','1F341C',1,61),(6,NULL,'ADMIN','006950',1,61),(7,NULL,'ADMIN','F79338',1,61),(8,NULL,'ADMIN','FFD569',1,61);
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercio`
--

DROP TABLE IF EXISTS `comercio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comercio` (
  `idcomercio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercio`
--

LOCK TABLES `comercio` WRITE;
/*!40000 ALTER TABLE `comercio` DISABLE KEYS */;
INSERT INTO `comercio` VALUES (61,'Tienda'),(62,'Tienda'),(63,'Juan Esteban'),(64,'JCCC'),(65,'Tienda'),(66,'Tienda'),(67,'Tienda'),(68,''),(69,'Tienda2'),(70,'Tienda'),(71,'Tienda'),(72,'Tienda'),(73,'Tienda'),(74,'Tienda'),(75,'Tiendaw'),(76,'Tiendaw'),(77,'Tienda'),(78,'Tienda'),(79,'Tienda'),(80,'Tienda2'),(81,'qefeqf'),(82,'Tienda'),(83,'Tienda'),(84,'Tienda2'),(85,'Tienda'),(86,'Tienda'),(87,'Tienda'),(88,'Tienda'),(89,'gw4'),(90,'Tienda'),(91,'Tienda'),(92,'Tienda'),(93,'Tienda'),(94,'Tienda'),(95,'Tienda'),(96,'Tienda'),(97,'Tienda'),(98,'Tienda'),(99,'Tienda'),(100,'Tienda gammer '),(101,''),(102,'Tienda'),(103,'Tienda gammer'),(104,'Tienda'),(105,'Tienda'),(106,'ComercioJuan'),(107,'JCCC');
/*!40000 ALTER TABLE `comercio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `idcompra` int NOT NULL AUTO_INCREMENT,
  `serie` varchar(10) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `igv` decimal(12,2) DEFAULT NULL,
  `descuento` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `idtipo_comprobante` int DEFAULT NULL,
  `idusuario` int DEFAULT NULL,
  `idproveedor` int DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `usuarioregistro` int DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `idtipo_comprobante` (`idtipo_comprobante`),
  KEY `idusuario` (`idusuario`),
  KEY `idproveedor` (`idproveedor`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idtipo_comprobante`) REFERENCES `tipo_comprobante` (`idtipo_comprobante`),
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_compra` (
  `iddetalle_compra` int NOT NULL AUTO_INCREMENT,
  `idcompra` int DEFAULT NULL,
  `idproducto` int DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `cantidad` decimal(12,2) DEFAULT NULL,
  `importe` decimal(12,2) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`iddetalle_compra`),
  KEY `idcompra` (`idcompra`),
  KEY `idproducto` (`idproducto`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`),
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `detalle_compra_ibfk_3` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int NOT NULL AUTO_INCREMENT,
  `idventa` int DEFAULT NULL,
  `idproducto` int DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `cantidad` decimal(12,2) DEFAULT NULL,
  `importe` decimal(12,2) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),
  KEY `idventa` (`idventa`),
  KEY `idproducto` (`idproducto`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca` (
  `idmarca` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idmarca`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'TABLETS','LENOVO',1,61),(2,'TABLETS','AZUS',1,61),(3,'TABLETS','SAMSUNG',1,61),(4,'TABLETS','LG',1,61);
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `idmenu` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso` (
  `idpermiso` int NOT NULL AUTO_INCREMENT,
  `idmenu` int DEFAULT NULL,
  `idrol` int DEFAULT NULL,
  `pread` int DEFAULT NULL,
  `pinsert` int DEFAULT NULL,
  `pupdate` int DEFAULT NULL,
  `pdelete` int DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `idproducto` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `stock` decimal(12,2) DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  `idcolor` int DEFAULT NULL,
  `idcategoria` int DEFAULT NULL,
  `idtipo_material` int DEFAULT NULL,
  `idmarca` int DEFAULT NULL,
  `idunmedida` int DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `idcolor` (`idcolor`),
  KEY `idcategoria` (`idcategoria`),
  KEY `idtipo_material` (`idtipo_material`),
  KEY `idmarca` (`idmarca`),
  KEY `idunmedida` (`idunmedida`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idcolor`) REFERENCES `color` (`idcolor`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idtipo_material`) REFERENCES `tipo_material` (`idtipo_material`),
  CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`),
  CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`idunmedida`) REFERENCES `unmedida` (`idunmedida`),
  CONSTRAINT `producto_ibfk_6` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'123','TABLET LENOVO','HERMOSA TABLET LENOVO','nodisponible.png',2.00,0.00,'',1,61,7,2,1,1,5);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `idproveedor` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `numdocumento` varchar(45) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idtipo_cliente` int NOT NULL,
  `idtipo_documento` int NOT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idproveedor`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `idcomercio` (`idcomercio`),
  KEY `proveedor_ibfk_1` (`idtipo_documento`),
  KEY `proveedor_ibfk_2` (`idtipo_cliente`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`),
  CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`idtipo_cliente`) REFERENCES `tipo_cliente` (`idtipo_cliente`),
  CONSTRAINT `proveedor_ibfk_3` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_tokens`
--

DROP TABLE IF EXISTS `reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_tokens` (
  `id_reset_token` int NOT NULL AUTO_INCREMENT,
  `idusuario` int DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration` int DEFAULT NULL,
  PRIMARY KEY (`id_reset_token`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `reset_tokens_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_tokens`
--

LOCK TABLES `reset_tokens` WRITE;
/*!40000 ALTER TABLE `reset_tokens` DISABLE KEYS */;
INSERT INTO `reset_tokens` VALUES (1,NULL,'97',5),(2,NULL,'97',38),(3,NULL,'97',8),(4,NULL,'97',0),(5,NULL,'97',0),(6,NULL,'97',0),(7,NULL,'97',748911),(8,NULL,'97',8),(9,NULL,'97',0),(10,NULL,'97',0),(11,NULL,'98',1),(12,NULL,'97',1),(13,NULL,'97',0),(14,NULL,'97',0),(15,NULL,'97',0),(16,97,'97c679509fb7d6f5c2fb17aff4942800b1447b8a7e543fc4b02388d4076c4f792',1700035605),(17,97,'bf13ed53ec7aa51e53f17d23eb9b124fba99196cde8fa35d1baf7dbbffbac3ac65',1700035658),(18,97,'3311fcdc75a20c4b8cb8edb48f3b143a29adf54d5af5fadb15bb9afc8625ec27',1700038216),(19,98,'9d907ed7d9fbd8bbaf4ca992737ba8e7563fc008b681ef8b66e2ac1e92c7e3da',1700038849),(20,98,'89e41a9959b8bcb024650ffb2355abe053658e5d6a5a232f026201261be3cf9d',1700038852),(21,NULL,'0ea4f9545a9d6a39812045f69f7c2acc420e3aaee69f19f3114dbd13786fb4ad',1700038987),(22,NULL,'d36ae7d61f30fa7ced499ebcc39e5162a760b92819325dfa8878565487b02a22',1700038992),(23,NULL,'d6733262789476587a010cc1809113843676c1f45ea5ab34ab93fb6ad3892659',1700039342),(24,NULL,'4a629a352f237098969f9274a16c21a36b5854a3c71d51f8ebd78e000e5df0c7',1700039366),(25,NULL,'b6c13b3b7df6504b376296f676674bbd68be251bcaebb42b6c4ba43a20e46854',1700039434),(26,NULL,'ec09549b17bb759cf855eacac1dd2c95ae0f1871d495ecc6f6b6de6c9f9260e9',1700039445),(27,NULL,'f700f6afe219bb99f6050ee06da68321899948e480e66e6b68d0124dc38929a7',1700039477),(29,97,'0ea3a818e9ea6bd534924043f3d7f75af10a14807379f546ee1e11893d1d29cf',1700057478),(32,97,'f40aeba4ecd78430f475a5fd06e8e59a655c79c8ce181bf93e1c35cd81c081b9',1700057712),(34,97,'e5833634919c17bbf54ae5e4b3d7a21a459114bd5b51303bf843f5f3d0a6a794',1700062186),(40,97,'e32b8fecb2f8391a87a2c2a434e2de8357b1fd99fb07eaefa81bd83862846fb9',1700076259),(41,97,'c36af684bfb48e4979c9102850c7472c5c88aea95d4684ceed2b018e5cf2e4d9',1700076301),(42,97,'e0486a9d281e5dd1bc697ba93261cb3874acac7a6776eb130cfb555bf6b0ad84',1700076386),(43,97,'0e4d7a1c1b6005b57d62805c81f95bdca9490bc140e0177231fd2f5b534007ef',1700076419),(44,97,'7607bb12fe22deccefb6f4ab825e2bfa1c82ed70a6b8473d78f7d21ca1f2035f',1700076554),(45,97,'918f978dd6851b8c694a514b382a4d9a771eacb23f618eb36c2e2087520ef730',1700076596),(46,97,'83af3df9934673dfc1cfb9107af95f1399467db6b690140ee68257b9467a33d6',1700076615);
/*!40000 ALTER TABLE `reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idrol`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (103,'ADMIN','ADMIN',1,103),(104,'ADMIN','ADMIN',1,104),(105,'ADMIN','ADMIN',1,105),(106,'ADMIN','ADMIN',1,106),(107,'ADMIN','ADMIN',1,107);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_cliente` (
  `idtipo_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idtipo_cliente`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `tipo_cliente_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (1,'PERSONA NATURAL','SISTEMA DE VENTAS',1,61);
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comprobante`
--

DROP TABLE IF EXISTS `tipo_comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_comprobante` (
  `idtipo_comprobante` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idtipo_comprobante`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `tipo_comprobante_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comprobante`
--

LOCK TABLES `tipo_comprobante` WRITE;
/*!40000 ALTER TABLE `tipo_comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_documento` (
  `idtipo_documento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idtipo_documento`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `tipo_documento_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'CEDULA DE CIDADANIA','SISTEMA DE VENTAS',1,61);
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_material`
--

DROP TABLE IF EXISTS `tipo_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_material` (
  `idtipo_material` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idtipo_material`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `tipo_material_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_material`
--

LOCK TABLES `tipo_material` WRITE;
/*!40000 ALTER TABLE `tipo_material` DISABLE KEYS */;
INSERT INTO `tipo_material` VALUES (1,'ALUMINIO','ALUMINIO',1,61),(2,'METANO','METANO',1,61),(3,'CARBON','CARBON',1,61),(4,'ORO','ORO',1,61),(5,'MAGNESIO','MAGNESIO',1,61),(6,'TIRIANOL','TIRIANOL',1,61),(7,'POLIMEFERO','POLIFEMERO',1,61),(8,'PLASTICO','PLASTICO',1,61);
/*!40000 ALTER TABLE `tipo_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unmedida`
--

DROP TABLE IF EXISTS `unmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unmedida` (
  `idunmedida` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idunmedida`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `unmedida_ibfk_1` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unmedida`
--

LOCK TABLES `unmedida` WRITE;
/*!40000 ALTER TABLE `unmedida` DISABLE KEYS */;
INSERT INTO `unmedida` VALUES (1,'1CM','1CM',1,61),(2,'2CM','2CM',1,61),(3,'3CM','3CM',1,61),(4,'4CM','4CM',1,61),(5,'5CM','5CM',1,61);
/*!40000 ALTER TABLE `unmedida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `user` varchar(10) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idrol` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login` (`user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `idrol` (`idrol`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (97,'marvin santos',NULL,NULL,NULL,NULL,'mesp3127@gmail.com',NULL,'marvin424','$2y$10$6XM1PfDRPRlZ8rlExiudw.9B45MTFXWhgcbzU2p.WQINJbTVyekfO',NULL,103,103),(98,'ADMIN',NULL,NULL,NULL,NULL,'mesp34127@gmail.com',NULL,'admin954','$2y$10$H1DKs00I0ftl02AeQKMKZOVb7xgfd.owWYyC94s6brRhe7VyLTDly',NULL,104,104),(99,'MARVIN EDUARDO SANTOS',NULL,NULL,NULL,NULL,'mesp3412eed7@gmail.com',NULL,'marvin583','$2y$10$2JPeN5RJCNNuTEbN5ikhROWyJXstnuUa4m3l93Ro7ozQctgPcIeMu',NULL,105,105),(100,'juan esteban arevalo contreras',NULL,NULL,NULL,NULL,'juanes22owen@gmail.com',NULL,'juan569','$2y$10$hH6qPxSZdkuxoJEmcxSmM.RITXJG9YlOq.IyVf1UMWHXzhPwNw8kC',NULL,106,106),(101,'Julián Camilo Contreras Chinchilla',NULL,NULL,NULL,NULL,'juliancamilo0802@gmail.com',NULL,'julián911','$2y$10$Qwgc24iiPozGJ.Cx9gduLOHc96AX8Kh2aZK1pPy4C0gs4dQIwv.VO',NULL,107,107);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `idventa` int NOT NULL AUTO_INCREMENT,
  `serie` varchar(10) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `igv` decimal(12,2) DEFAULT NULL,
  `descuento` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `idtipo_comprobante` int DEFAULT NULL,
  `idusuario` int DEFAULT NULL,
  `idcliente` int DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `usuarioregistro` int DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `idcomercio` int NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `idtipo_comprobante` (`idtipo_comprobante`),
  KEY `idusuario` (`idusuario`),
  KEY `idcliente` (`idcliente`),
  KEY `idcomercio` (`idcomercio`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idtipo_comprobante`) REFERENCES `tipo_comprobante` (`idtipo_comprobante`),
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`idcomercio`) REFERENCES `comercio` (`idcomercio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'checkoutplus'
--

--
-- Dumping routines for database 'checkoutplus'
--
/*!50003 DROP PROCEDURE IF EXISTS `CrearComercioYUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearComercioYUsuario`(
    IN nombre_comercio VARCHAR(255),
    IN nombre_usuario VARCHAR(255),
    IN usuario_in VARCHAR(255),
    IN email_in VARCHAR(255),
    IN pass VARCHAR(255),
    OUT mensaje VARCHAR(255)
)
BEGIN
    -- Declare variables
    DECLARE id_comercio INT;
    DECLARE id_rol INT;
    DECLARE email_exists_count INT;
    DECLARE user_exists_count INT;

    -- Check if the email already exists
    SELECT COUNT(*) INTO email_exists_count FROM usuario WHERE email = email_in;

    -- Check if the user already exists
    SELECT COUNT(*) INTO user_exists_count FROM usuario WHERE user = usuario_in;

    -- If email or user already exists, set an error message
    IF email_exists_count > 0 THEN
        SET mensaje = 'error_email_existe';
    ELSEIF user_exists_count > 0 THEN
        SET mensaje = 'El nombre de usuario ya está registrado';
    ELSE
        -- Paso 1: Insertar un nuevo comercio
        INSERT INTO comercio (nombre) VALUES (nombre_comercio);
        SET id_comercio = LAST_INSERT_ID();

        -- Paso 2: Insertar un nuevo rol
        INSERT INTO rol (nombre, descripcion, estado, idcomercio) VALUES ('ADMIN', 'ADMIN', 1, id_comercio);
        SET id_rol = LAST_INSERT_ID();

        -- Paso 3: Insertar un nuevo usuario asociado al comercio y rol
        INSERT INTO usuario (nombre, user, email, pass, idrol, idcomercio) 
        VALUES (nombre_usuario, usuario_in, email_in, pass, id_rol, id_comercio);

        -- Set success message
        SET mensaje = 'OK';
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-15 14:29:56
