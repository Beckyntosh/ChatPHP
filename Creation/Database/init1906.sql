CREATE TABLE IF NOT EXISTS archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO archives (file_name) VALUES ('Project_Alpha.zip');
INSERT INTO archives (file_name) VALUES ('Project_Beta.zip');
INSERT INTO archives (file_name) VALUES ('Project_Gamma.zip');
INSERT INTO archives (file_name) VALUES ('Project_Delta.zip');
INSERT INTO archives (file_name) VALUES ('Project_Epsilon.zip');
INSERT INTO archives (file_name) VALUES ('Project_Zeta.zip');
INSERT INTO archives (file_name) VALUES ('Project_Eta.zip');
INSERT INTO archives (file_name) VALUES ('Project_Theta.zip');
INSERT INTO archives (file_name) VALUES ('Project_Iota.zip');
INSERT INTO archives (file_name) VALUES ('Project_Kappa.zip');
