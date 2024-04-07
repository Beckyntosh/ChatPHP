CREATE TABLE IF NOT EXISTS archive_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO archive_files (filename) VALUES ('Project_Alpha.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Beta.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Gamma.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Delta.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Epsilon.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Zeta.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Eta.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Theta.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Iota.zip');
INSERT INTO archive_files (filename) VALUES ('Project_Kappa.zip');