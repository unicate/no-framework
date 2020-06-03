DROP DATABASE IF EXISTS nofw;

DROP USER IF EXISTS 'nofw_app'@'localhost';
DROP USER IF EXISTS 'nofw_app'@'%';

CREATE DATABASE nofw CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'nofw_app'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'nofw_app'@'%' IDENTIFIED BY '123456';

GRANT ALL ON nofw.* TO 'nofw_app'@'localhost';
GRANT ALL ON nofw.* TO 'nofw_app'@'%';

FLUSH PRIVILEGES;

use nofw;