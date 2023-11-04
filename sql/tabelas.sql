CREATE TABLE `ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(500) DEFAULT NULL,
  `a` varchar(500) DEFAULT NULL,
  `b` varchar(500) DEFAULT NULL,
  `c` varchar(500) DEFAULT NULL,
  `d` varchar(500) DEFAULT NULL,
  `resposta` varchar(500) DEFAULT NULL,
  `disciplina` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;