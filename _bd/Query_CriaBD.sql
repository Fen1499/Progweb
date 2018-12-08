CREATE TABLE `login` (
  `userName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `userPass` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `disciplina` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_nome` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`disc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `professor` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_nome` varchar(20) CHARACTER SET utf8 NOT NULL,
  `profPass` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `aula` (
  `aula_dia` int(11) NOT NULL,
  `aula_sala` int(11) NOT NULL,
  `aula_hora` int(11) NOT NULL,
  `disc_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  PRIMARY KEY (`aula_dia`,`aula_sala`,`aula_hora`),
  KEY `disc_id` (`disc_id`),
  KEY `prof_id` (`prof_id`),
  CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`disc_id`) REFERENCES `disciplina` (`disc_id`),
  CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



