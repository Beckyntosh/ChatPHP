CREATE TABLE IF NOT EXISTS config_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO config_files (filename) VALUES ('nginx.conf');
INSERT INTO config_files (filename) VALUES ('apache.conf');
INSERT INTO config_files (filename) VALUES ('mysql.conf');
INSERT INTO config_files (filename) VALUES ('php.conf');
INSERT INTO config_files (filename) VALUES ('server.conf');
INSERT INTO config_files (filename) VALUES ('network.conf');
INSERT INTO config_files (filename) VALUES ('security.conf');
INSERT INTO config_files (filename) VALUES ('backup.conf');
INSERT INTO config_files (filename) VALUES ('monitoring.conf');
INSERT INTO config_files (filename) VALUES ('firewall.conf');
