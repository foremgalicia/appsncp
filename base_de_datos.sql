--
-- Base da Datos
--

-- --------------------------------------------------------

--
-- `dsr_SNCP_cualificaciones`
--

CREATE TABLE IF NOT EXISTS `dsr_SNCP_cualificaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_familia` int(11) DEFAULT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` tinyint(4) DEFAULT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_gal` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- `dsr_SNCP_cualificaciones_unidades`
--

CREATE TABLE IF NOT EXISTS `dsr_SNCP_cualificaciones_unidades` (
  `id_cualificacion` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `orden` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- `dsr_SNCP_familias`
--

CREATE TABLE IF NOT EXISTS `dsr_SNCP_familias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_gal` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- `dsr_SNCP_unidades`
--

CREATE TABLE IF NOT EXISTS `dsr_SNCP_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` tinyint(4) DEFAULT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_gal` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `medios` text COLLATE utf8_spanish_ci,
  `productos` text COLLATE utf8_spanish_ci,
  `informacion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
