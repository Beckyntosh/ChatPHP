CREATE TABLE IF NOT EXISTS zip_archives (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_filename (filename)
);

INSERT INTO zip_archives (filename) VALUES ('Project_Alpha.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Beta.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Gamma.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Delta.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Epsilon.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Zeta.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Eta.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Theta.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Iota.zip');
INSERT INTO zip_archives (filename) VALUES ('Project_Kappa.zip');
