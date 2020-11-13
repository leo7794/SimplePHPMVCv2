CREATE TABLE `comunicaciones` (
	`cmnid` BIGINT(18) NOT NULL AUTO_INCREMENT,
	`clientid` BIGINT(15) NOT NULL,
	`cmnnotas` VARCHAR(500) NOT NULL COLLATE 'utf8_general_ci',
	`cmntags` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`cmnfching` DATETIME NOT NULL,
	`cmnusring` BIGINT(10) NULL DEFAULT NULL,
	`cmntipo` VARCHAR(45) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`cmnid`) USING BTREE,
	INDEX `FK__clients` (`clientid`) USING BTREE,
	INDEX `FK_comunicaciones_usuario` (`cmnusring`) USING BTREE,
	CONSTRAINT `FK__clients` FOREIGN KEY (`clientid`) REFERENCES `nw202003`.`clients` (`clientid`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `FK_comunicaciones_usuario` FOREIGN KEY (`cmnusring`) REFERENCES `nw202003`.`usuario` (`usercod`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;