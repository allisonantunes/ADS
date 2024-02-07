CREATE TABLE `func` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `salario` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `equipamento` (
  `idequipamento` int(15) NOT NULL AUTO_INCREMENT,
  `nomeequipamento` varchar(45) NOT NULL,
  `responsavel` int(11) NOT NULL,
  PRIMARY KEY (`idequipamento`),
  KEY `fk_resp` (`responsavel`),
  CONSTRAINT `fk_resp` FOREIGN KEY (`responsavel`) REFERENCES `func` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



