CREATE TABLE IF NOT EXISTS `test_paginacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paginacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `test_paginacion` (`id`, `paginacion`) VALUES
(1, 'uno'),
(2, 'dos'),
(3, 'tres'),
(4, 'cuatro'),
(5, 'cinco'),
(6, 'seis'),
(7, 'siete'),
(8, 'ocho'),
(9, 'nueve'),
(10, 'diez'),
(11, 'once'),
(12, 'doce'),
(13, 'trece'),
(14, 'catorce');