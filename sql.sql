USE scandi;
drop table if exists product ;
create table product (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL UNIQUE,
`sku` varchar(30) NOT NULL UNIQUE,
`price` DECIMAL(15,2) NOT NULL,
`type` varchar(15) NOT NULL,
`attribute` varchar(30) NOT NULL,
PRIMARY KEY (`id`)
);