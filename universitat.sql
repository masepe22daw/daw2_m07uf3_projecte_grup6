CREATE DATABASE IF NOT EXISTS universitat;
CREATE USER 'admin-clot'@'localhost' IDENTIFIED BY '1234';

GRANT ALL PRIVILEGES ON universitat.* TO 'admin-clot'@'localhost' IDENTIFIED BY '1234';