CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(256) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectAlpha.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectBeta.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectGamma.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectDelta.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectEpsilon.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectZeta.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectEta.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectTheta.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectIota.zip");
INSERT INTO uploaded_files (file_name) VALUES ("uploads/ProjectKappa.zip");
