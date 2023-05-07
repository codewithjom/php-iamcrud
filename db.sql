CREATE DATABASE php_iamcrud;

CREATE TABLE fruits(
    fruit_id int(11) AUTO_INCREMENT,
    fruit_name varchar(255),
    fruit_qty int(11),
    fruit_created datetime DEFAULT CURRENT_TIMESTAMP,
    fruit_updated datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (fruit_id)
);
