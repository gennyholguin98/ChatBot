drop table registro;

CREATE TABLE `registro` (
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `identificacion` varchar(300) NOT NULL,
  `entidad` varchar(300) NOT NULL,
  `url_remision` varchar(300) NOT NULL,
  `estado` varchar(300),
  `codigo` int(20) NOT NULL AUTO_INCREMENT
   ,PRIMARY KEY (`codigo`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `registro` AUTO_INCREMENT=10000;

INSERT INTO `registro` (`nombre`, `apellido`,`identificacion`,`entidad`,`url_remision`,`estado`,`codigo`) VALUES
('arturo', 'Matiz','10544545','eps sura','123','',),
('pepe', ' Camacho','65434567654','nueva eps','123','',);



--

