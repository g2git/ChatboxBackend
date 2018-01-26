<?php
/**
 * Created by PhpStorm.
 * User: gimmy
 * Date: 26-1-18
 * Time: 17:21
 */


$sql = "CREATE TABLE Message (
id int(10) UNSIGNED AUTO_INCREMENT,
username varchar(255) NOT NULL,
mykey varchar(255) NOT NULL,
value varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);

ENGINE=InnoDB DEFAULT CHARSET=latin1";



?>