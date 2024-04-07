CREATE TABLE IF NOT EXISTS uploaded_archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_archives (filename) VALUES ('ProjectAlpha.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectBeta.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectGamma.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectDelta.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectEpsilon.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectZeta.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectEta.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectTheta.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectIota.zip');
INSERT INTO uploaded_archives (filename) VALUES ('ProjectKappa.zip');