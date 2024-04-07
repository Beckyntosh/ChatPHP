CREATE TABLE IF NOT EXISTS uploaded_zips (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_zips (filename) VALUES ('ProjectAlpha.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectBeta.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectGamma.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectDelta.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectEpsilon.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectZeta.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectEta.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectTheta.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectIota.zip');
INSERT INTO uploaded_zips (filename) VALUES ('ProjectKappa.zip');