CREATE TABLE IF NOT EXISTS zip_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO zip_files (filename) VALUES ('ProjectAlpha.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectBeta.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectGamma.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectDelta.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectEpsilon.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectZeta.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectEta.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectTheta.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectIota.zip');
INSERT INTO zip_files (filename) VALUES ('ProjectKappa.zip');
