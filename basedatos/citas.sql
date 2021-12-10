drop table citas;

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(300) NOT NULL,
  `id_neumologo` int(11),
  `codigo` int(20),
   PRIMARY KEY(`id_cita`),
  FOREIGN KEY ( `id_neumologo`)
        REFERENCES neumologo( `id`)
   

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `citas` (`fecha`,`hora`,`id_neumologo`) VALUES
('2021-12-11', '11', 3),
('2021-12-12', '10', 3),
('2021-12-11', '9', 2),
('2021-12-31', '7', 2),
('2021-12-15', '4', 1),
('2021-12-18', '5', 1);

