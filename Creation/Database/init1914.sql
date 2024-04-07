CREATE TABLE IF NOT EXISTS archived_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO archived_files (file_name) VALUES ('Project_Alpha.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Beta.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Gamma.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Delta.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Epsilon.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Zeta.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Eta.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Theta.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Iota.zip');
INSERT INTO archived_files (file_name) VALUES ('Project_Kappa.zip');
