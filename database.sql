CREATE DATABASE Libra;
USE Libra;

CREATE TABLE `users` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`email` varchar(250) NOT NULL DEFAULT '',
	`password` varchar(200) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`)
VALUES
(1,'admin@admin.com','admin');

CREATE TABLE `Books` ( 
	`BooksID` INT(100) NOT NULL AUTO_INCREMENT ,
	`Author` VARCHAR(25) NOT NULL , 
	`Title` VARCHAR(25) NOT NULL , 
	`Type` VARCHAR(25) NOT NULL , 
	PRIMARY KEY (`BooksID`)
	) ENGINE = InnoDB;

