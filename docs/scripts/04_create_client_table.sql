CREATE TABLE `clients` (
	`clientid` BIGINT(15) NOT NULL AUTO_INCREMENT,
	`clientname` VARCHAR(128) NULL DEFAULT NULL,
	`clientgender` CHAR(3) NULL DEFAULT NULL,
	`clientphone1` VARCHAR(255) NULL DEFAULT NULL,
	`clientphone2` VARCHAR(255) NULL DEFAULT NULL,
	`clientemail` VARCHAR(255) NULL DEFAULT NULL,
	`clientidnumber` VARCHAR(45) NULL DEFAULT NULL,
	`clientbio` VARCHAR(500) NULL DEFAULT NULL,
	`clientstatus` CHAR(3) NULL DEFAULT NULL,
	`clientdatecrt` DATETIME NULL DEFAULT NULL,
	`clientusercrt` BIGINT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`clientid`)
)