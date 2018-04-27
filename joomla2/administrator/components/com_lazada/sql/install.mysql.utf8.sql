CREATE TABLE `#__lazada_product` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__lazada_product` (`name`) VALUES
('San pham 1!'),
('San pham 2!');