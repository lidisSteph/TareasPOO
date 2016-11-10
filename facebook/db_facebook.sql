-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2016 a las 04:12:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_facebook`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_amigos`
--

CREATE TABLE IF NOT EXISTS `tbl_amigos` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_usuario_amigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuario`,`codigo_usuario_amigo`),
  KEY `fk_tbl_amigos_tbl_usuarios_idx` (`codigo_usuario`),
  KEY `fk_tbl_amigos_tbl_usuarios1_idx` (`codigo_usuario_amigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_amigos`
--

INSERT INTO `tbl_amigos` (`codigo_usuario`, `codigo_usuario_amigo`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1),
(13, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `url_imagen_perfil` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `nombre_usuario`, `correo`, `contrasena`, `url_imagen_perfil`) VALUES
(1, 'Patricio', 'patricio@gmail.com', 'asd.456', 'img/profile-pics/patricio.jpg'),
(2, 'Vegeta', 'vegeta@gmail.com', 'asd.456', 'img/profile-pics/vegeta.jpg'),
(3, '16', '16@gmail.com', 'asd.456', 'img/profile-pics/androide_16.jpg'),
(4, '18', '18@gmail.com', 'asd.456', 'img/profile-pics/androide_18.jpg'),
(5, '19', '19@gmail.com', 'asd.456', 'img/profile-pics/androide_19.jpg'),
(6, 'Baby', 'baby@gmail.com', 'asd.456', 'img/profile-pics/baby.jpg'),
(7, 'Bulma', 'bulma@gmail.com', 'asd.456', 'img/profile-pics/bulma.jpg'),
(8, 'Cell', 'cell@gmail.com', 'asd.456', 'img/profile-pics/cell.jpg'),
(9, 'Chaozu', 'chaozu@gmail.com', 'asd.456', 'img/profile-pics/chaozu.jpg'),
(10, 'Dende', 'dende@gmail.com', 'asd.456', 'img/profile-pics/dende.jpg'),
(11, 'Dodoria', 'dodoria@gmail.com', 'asd.456', 'img/profile-pics/dodoria.jpg'),
(12, 'Freezer', 'freezer@gmail.com', 'asd.456', 'img/profile-pics/freezer.jpg'),
(13, 'Gohan', 'gohan@gmail.com', 'asd.456', 'img/profile-pics/gohan.jpg'),
(14, 'Goku', 'goku@gmail.com', 'asd.456', 'img/profile-pics/goku.jpg'),
(15, 'Goten', 'goten@gmail.com', 'asd.456', 'img/profile-pics/goten.png'),
(16, 'Kami', 'kami@gmail.com', 'asd.456', 'img/profile-pics/kami.jpg'),
(17, 'Kibito', 'kibito@gmail.com', 'asd.456', 'img/profile-pics/kibito.jpg'),
(18, 'Krilin', 'krilin@gmail.com', 'asd.456', 'img/profile-pics/krilin.jpg'),
(19, 'Majinboo', 'majinboo@gmail.com', 'asd.456', 'img/profile-pics/majinboo.jpg'),
(20, 'MrSatan', 'mr_satan@gmail.com', 'asd.456', 'img/profile-pics/mr_satan.jpg'),
(21, 'Nappa', 'nappa@gmail.com', 'asd.456', 'img/profile-pics/nappa.jpg'),
(22, 'Oolong', 'oolong@gmail.com', 'asd.456', 'img/profile-pics/oolong.jpg'),
(23, 'Pan', 'pan@gmail.com', 'asd.456', 'img/profile-pics/pan.png'),
(24, 'Shenlong', 'shenlong@gmail.com', 'asd.456', 'img/profile-pics/shenlong.jpg'),
(25, 'Picoro', 'picoro@gmail.com', 'asd.456', 'img/profile-pics/picoro.jpg'),
(26, 'Puar', 'puar@gmail.com', 'asd.456', 'img/profile-pics/puar.jpg'),
(27, 'Etna', 'etna@gmail.com', 'asd.456', 'img/profile-pics/taopaipai.jpg'),
(28, 'Mama', 'mama@gmail.com', 'asd.456', 'img/profile-pics/trunks.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_amigos`
--
ALTER TABLE `tbl_amigos`
  ADD CONSTRAINT `fk_tbl_amigos_tbl_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_amigos_tbl_usuarios1` FOREIGN KEY (`codigo_usuario_amigo`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
