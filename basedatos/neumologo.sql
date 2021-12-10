
drop table neumologo;
CREATE TABLE `neumologo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `neumologo` (`nombre`, `apellido`) VALUES
('Carlos', 'Matiz'),
('Rafael Enrique', 'Conde Camacho'),
('. Juan Pablo', 'Rodríguez Gallego');
