-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-10-2020 a las 22:53:14
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bddelivery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `codcj` int(10) NOT NULL AUTO_INCREMENT,
  `fechacj` date DEFAULT NULL,
  `importecj` double(10,2) DEFAULT NULL,
  `norden` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  `id_usu` int(10) DEFAULT NULL,
  `observcj` longtext,
  PRIMARY KEY (`codcj`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`codcj`, `fechacj`, `importecj`, `norden`, `codsuc`, `id_usu`, `observcj`) VALUES
(1, '2020-07-21', 95.00, 3, NULL, 7, 'cc'),
(2, '2020-07-22', 115.00, 4, NULL, 7, 'dejo ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codnu`
--

DROP TABLE IF EXISTS `codnu`;
CREATE TABLE IF NOT EXISTS `codnu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `norden` int(10) DEFAULT NULL,
  `nordenrec` int(10) DEFAULT NULL,
  `fechaactual` date DEFAULT NULL,
  `tcambioo` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codnu`
--

INSERT INTO `codnu` (`id`, `norden`, `nordenrec`, `fechaactual`, `tcambioo`) VALUES
(1, 5, 12, '2018-01-01', 6.97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `coddep` int(10) NOT NULL AUTO_INCREMENT,
  `descripdepto` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`coddep`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`coddep`, `descripdepto`) VALUES
(1, 'LA PAZ'),
(2, 'SANTA CRUZ'),
(3, 'COCHABAMBA'),
(4, 'ORURO'),
(5, 'POTOSI'),
(7, 'SUCRE'),
(8, 'TARIJA'),
(9, 'BENI'),
(10, 'PANDO'),
(11, 'EL ALTO'),
(12, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fgasto`
--

DROP TABLE IF EXISTS `fgasto`;
CREATE TABLE IF NOT EXISTS `fgasto` (
  `codga` int(10) NOT NULL AUTO_INCREMENT,
  `descripga` varchar(50) DEFAULT NULL,
  `fechaga` date DEFAULT NULL,
  `importega` double(10,2) DEFAULT NULL,
  `id_usu` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  PRIMARY KEY (`codga`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fgasto`
--

INSERT INTO `fgasto` (`codga`, `descripga`, `fechaga`, `importega`, `id_usu`, `codsuc`) VALUES
(1, 'PAPEL BOND OFICIO', '2020-07-21', 20.00, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `codga` int(10) NOT NULL AUTO_INCREMENT,
  `detgasto` int(10) DEFAULT NULL,
  `fechaga` int(10) DEFAULT NULL,
  `importega` double(10,2) DEFAULT NULL,
  `id_usu` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  PRIMARY KEY (`codga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `codgru` int(10) NOT NULL AUTO_INCREMENT,
  `detgrupo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codgru`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`codgru`, `detgrupo`) VALUES
(1, 'SOPAS'),
(2, 'PLATO DE FONDO'),
(3, 'BEBIDAS'),
(4, 'POSTRES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuu`
--

DROP TABLE IF EXISTS `menuu`;
CREATE TABLE IF NOT EXISTS `menuu` (
  `codme` int(10) NOT NULL AUTO_INCREMENT,
  `codgru` int(10) DEFAULT NULL,
  `detmenu` varchar(80) DEFAULT NULL,
  `precio` double(10,2) DEFAULT NULL,
  `dcto` double(10,2) DEFAULT NULL,
  `oferta` char(2) DEFAULT NULL,
  `fotome` varchar(35) DEFAULT NULL,
  `blkme` char(2) DEFAULT NULL,
  `ingredientes` longtext,
  `cddia` char(2) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  PRIMARY KEY (`codme`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menuu`
--

INSERT INTO `menuu` (`codme`, `codgru`, `detmenu`, `precio`, `dcto`, `oferta`, `fotome`, `blkme`, `ingredientes`, `cddia`, `codsuc`) VALUES
(2, 1, 'SAICE CBBA', 40.00, 5.00, 'NO', 'login/fotos/a2.jpg', 'SI', 'Carne Molida,cebolla,papa,arvejas Zarsa,arroz blanco ,llahjua', NULL, 1),
(3, 1, 'SOPA DE POLLO', 60.00, 0.00, 'NO', 'login/fotos/a3.jpg', 'SI', 'Carne de Pollo arroz,huevo,arroz', NULL, 1),
(4, 2, 'CHICARRON DE CERDO', 47.00, 0.00, 'NO', 'login/fotos/a4.jpg', 'SI', 'Carne de cerdo,mote chuno aji colorado picante', NULL, 2),
(15, 3, 'COCA COLA 2 LTRS', 10.50, NULL, NULL, 'login/fotos/2020-07-2117-15-55.jpg', 'SI', 'CONTENIDO 3 LTRS NETOS', NULL, 2),
(14, 2, 'PIQUE MACHO', 47.00, NULL, NULL, 'login/fotos/2020-07-2117-15-41.jpg', 'SI', 'salchicha papa carne', NULL, 2),
(16, 3, 'FANTA LIMON', 13.00, NULL, NULL, 'login/fotos/2020-07-2117-16-15.jpg', 'SI', 'BOLTELLA RETORNABLE', NULL, 2),
(17, 4, 'HELADO DE CHOCOLATE', 15.00, NULL, NULL, 'login/fotos/2020-06-1520-39-31.jpg', 'SI', 'HELADO FRUTAS', NULL, 2),
(18, 2, 'CHARKEKAN ORUREÃ‘O', 45.00, NULL, NULL, 'login/fotos/2020-06-1520-39-42.jpg', 'SI', 'CARNE DE LLAMA ', NULL, 1),
(20, 3, 'CERVEZA HUARI', 15.00, NULL, NULL, 'login/fotos/2020-06-1520-37-42.jpg', 'SI', 'botella 50 cc', NULL, 2),
(21, 3, 'PEPSI 3 LITROS', 10.00, NULL, NULL, 'login/fotos/2020-06-1520-24-56.jpg', 'SI', 'CC', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimdet`
--

DROP TABLE IF EXISTS `movimdet`;
CREATE TABLE IF NOT EXISTS `movimdet` (
  `codmv` int(10) NOT NULL AUTO_INCREMENT,
  `codme` int(10) DEFAULT NULL,
  `detmenu` varchar(80) DEFAULT NULL,
  `cant` int(7) DEFAULT NULL,
  `preciodt` double(10,2) DEFAULT NULL,
  `subtot` double(10,2) DEFAULT NULL,
  `fechadt` date DEFAULT NULL,
  `norden` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  `id_usu` int(10) DEFAULT NULL,
  PRIMARY KEY (`codmv`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimdet`
--

INSERT INTO `movimdet` (`codmv`, `codme`, `detmenu`, `cant`, `preciodt`, `subtot`, `fechadt`, `norden`, `codsuc`, `id_usu`) VALUES
(4, 4, 'CHICARRON DE CERDO', 2, 47.00, 94.00, '2020-07-21', 2, 2, NULL),
(3, 2, 'SAICE CBBA', 1, 40.00, 40.00, '2020-07-21', 2, 1, NULL),
(5, 2, 'SAICE CBBA', 1, 40.00, 40.00, '2020-07-21', 3, 1, NULL),
(6, 18, 'CHARKEKAN ORUREÃ‘O', 1, 45.00, 45.00, '2020-07-21', 3, 1, NULL),
(7, 21, 'PEPSI 3 LITROS', 1, 10.00, 10.00, '2020-07-21', 3, 1, NULL),
(8, 3, 'SOPA DE POLLO', 1, 60.00, 60.00, '2020-07-22', 4, 1, NULL),
(9, 18, 'CHARKEKAN ORUREÃ‘O', 1, 45.00, 45.00, '2020-07-22', 4, 1, NULL),
(10, 21, 'PEPSI 3 LITROS', 1, 10.00, 10.00, '2020-07-22', 4, 1, NULL),
(11, 2, 'SAICE CBBA', 1, 40.00, 40.00, '2020-10-27', 5, 1, NULL),
(12, 4, 'CHICARRON DE CERDO', 1, 47.00, 47.00, '2020-10-27', 5, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimtot`
--

DROP TABLE IF EXISTS `movimtot`;
CREATE TABLE IF NOT EXISTS `movimtot` (
  `codmt` int(10) NOT NULL AUTO_INCREMENT,
  `fechato` date DEFAULT NULL,
  `clientenom` varchar(100) DEFAULT NULL,
  `importetot` double(10,2) DEFAULT NULL,
  `items` int(5) DEFAULT NULL,
  `norden` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `id_usu` int(10) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `direccionmv` varchar(100) DEFAULT NULL,
  `celmv` varchar(20) DEFAULT NULL,
  `refermv` varchar(5) DEFAULT NULL,
  `unixi` bigint(12) DEFAULT NULL COMMENT 'enviado el pedido ',
  `unixf` bigint(12) DEFAULT NULL COMMENT 'cancelando a caja',
  `observt` longtext,
  PRIMARY KEY (`codmt`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimtot`
--

INSERT INTO `movimtot` (`codmt`, `fechato`, `clientenom`, `importetot`, `items`, `norden`, `codsuc`, `estado`, `id_usu`, `codigo`, `direccionmv`, `celmv`, `refermv`, `unixi`, `unixf`, `observt`) VALUES
(2, '2020-07-21', 'MARINA NUÃ‘EZ', 134.00, 2, 2, 2, 'Pendiente', NULL, '2020-07-2117-10-02', 'CALLE ALAMOS Y BURGOA', '71947587', 'D', NULL, NULL, NULL),
(3, '2020-07-21', 'MARITZA REYNOLS ROMERO', 95.00, 3, 3, 1, 'Cancelado', 7, '2020-07-2117-17-28', 'CALLE 3 DE MAYO Y PIZARRRO', '77766255', 'D', 1595366467, 0, NULL),
(4, '2020-07-22', 'MARITZA REYNOLS ROMERO', 115.00, 3, 4, 1, 'Cancelado', 7, '2020-07-2216-26-32', 'CALLE NICARAGUS Y MENDEZ ARCOS', '7689666666', 'X', 1595449710, 0, NULL),
(5, '2020-10-27', 'ROMINA VILLANUEVA', 87.00, 2, 5, 2, 'Pendiente', NULL, '2020-10-2718-44-23', 'CALLE MOJITOS 45', '71945788', 'N', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id_per` int(10) NOT NULL AUTO_INCREMENT,
  `nombreper` varchar(70) DEFAULT NULL,
  `emailper` varchar(100) DEFAULT NULL,
  `celper` varchar(50) DEFAULT NULL,
  `direccper` varchar(150) DEFAULT NULL,
  `observper` varchar(300) DEFAULT NULL,
  `fotoper` varchar(100) DEFAULT NULL,
  `ciper` varchar(30) DEFAULT NULL,
  `qrfotoper` varchar(300) DEFAULT NULL,
  `coddep` int(10) DEFAULT NULL,
  `codcar` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  `asignado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_per`, `nombreper`, `emailper`, `celper`, `direccper`, `observper`, `fotoper`, `ciper`, `qrfotoper`, `coddep`, `codcar`, `codsuc`, `asignado`) VALUES
(1, 'JUAN PEREZ', 'raul.webnet@hotmail.com', '71454878', 'CALLE ARAMAYO', 'NINGUNA', NULL, '421578', NULL, 1, 0, 0, NULL),
(16, 'JUAN VALDEZ ROCHA ', 'raul.webnet@hotmail.com', '77289887', 'CALLE NICARAGUS Y MENDEZ ARCOS', 'cc', NULL, '3455554', NULL, NULL, NULL, 1, 'SI'),
(17, 'RINA HOUSTON', 'rina@hotmail.com', '71945873', 'CALLE BUSTAMANETE', 'cc', NULL, '20987666', NULL, NULL, NULL, 1, 'SI'),
(18, 'SANTOS MACHICADO', 'oscarIN@hotmail.com', '77289887', 'CALLE NICARAGUS Y MENDEZ ARCOS', 'cc', NULL, '3071525', NULL, NULL, NULL, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalmoto`
--

DROP TABLE IF EXISTS `personalmoto`;
CREATE TABLE IF NOT EXISTS `personalmoto` (
  `coden` int(10) NOT NULL AUTO_INCREMENT,
  `id_per` int(10) DEFAULT NULL,
  `nentregas` int(10) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `asignado` char(2) DEFAULT NULL,
  `norden` int(10) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  PRIMARY KEY (`coden`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personalmoto`
--

INSERT INTO `personalmoto` (`coden`, `id_per`, `nentregas`, `placa`, `asignado`, `norden`, `codsuc`) VALUES
(1, 18, NULL, '78-pppo', 'NO', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `codsuc` int(10) NOT NULL AUTO_INCREMENT,
  `detsucursal` varchar(50) DEFAULT NULL,
  `dirsuc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codsuc`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`codsuc`, `detsucursal`, `dirsuc`) VALUES
(1, 'CENTRAL', 'CALLE FIGUEROSA 45'),
(2, 'NORTE ', 'CALLE RAMAYO Y PILAR No 67');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `nomb_usu` varchar(50) DEFAULT NULL,
  `pass_usu` varchar(100) DEFAULT NULL,
  `id_area` varchar(20) DEFAULT NULL,
  `id_per` int(10) DEFAULT NULL,
  `coddep` int(10) DEFAULT NULL,
  `nombredepto` varchar(15) DEFAULT NULL,
  `nomb_suc` varchar(60) DEFAULT NULL,
  `codsuc` int(10) DEFAULT NULL,
  `codtisuc` int(10) DEFAULT NULL,
  `fotousu` varchar(100) DEFAULT NULL,
  `qrfotousu` varchar(200) DEFAULT NULL,
  `codcar` int(10) DEFAULT NULL,
  `mnu_compras` int(5) DEFAULT NULL,
  `mnu_ventas` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `usuario`, `nomb_usu`, `pass_usu`, `id_area`, `id_per`, `coddep`, `nombredepto`, `nomb_suc`, `codsuc`, `codtisuc`, `fotousu`, `qrfotousu`, `codcar`, `mnu_compras`, `mnu_ventas`) VALUES
(1, 'admin', 'CARLOS REYNALDO VERA', 'admin', 'admin', 1, NULL, NULL, NULL, 0, NULL, '', NULL, NULL, NULL, NULL),
(6, 'juan', 'JUAN VALDEZ ROCHA ', 'juan', 'adm', 16, NULL, NULL, NULL, 1, NULL, '', NULL, NULL, NULL, NULL),
(7, 'rina', 'RINA HOUSTON', 'rina', 'caja', 17, NULL, NULL, NULL, 1, NULL, '', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
