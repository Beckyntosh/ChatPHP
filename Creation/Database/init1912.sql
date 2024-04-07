CREATE TABLE IF NOT EXISTS archive_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO archive_info (name) VALUES ('Project Alpha.zip');
INSERT INTO archive_info (name) VALUES ('Project Beta.zip');
INSERT INTO archive_info (name) VALUES ('Project Gamma.zip');
INSERT INTO archive_info (name) VALUES ('Project Delta.zip');
INSERT INTO archive_info (name) VALUES ('Project Epsilon.zip');
INSERT INTO archive_info (name) VALUES ('Project Zeta.zip');
INSERT INTO archive_info (name) VALUES ('Project Eta.zip');
INSERT INTO archive_info (name) VALUES ('Project Theta.zip');
INSERT INTO archive_info (name) VALUES ('Project Iota.zip');
INSERT INTO archive_info (name) VALUES ('Project Kappa.zip');
