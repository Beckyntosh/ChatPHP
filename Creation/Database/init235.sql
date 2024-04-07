CREATE TABLE IF NOT EXISTS cad_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cad_uploads (filename) VALUES ('file1.cad');
INSERT INTO cad_uploads (filename) VALUES ('file2.dwg');
INSERT INTO cad_uploads (filename) VALUES ('file3.cad');
INSERT INTO cad_uploads (filename) VALUES ('file4.dwg');
INSERT INTO cad_uploads (filename) VALUES ('file5.cad');
INSERT INTO cad_uploads (filename) VALUES ('file6.dwg');
INSERT INTO cad_uploads (filename) VALUES ('file7.cad');
INSERT INTO cad_uploads (filename) VALUES ('file8.dwg');
INSERT INTO cad_uploads (filename) VALUES ('file9.cad');
INSERT INTO cad_uploads (filename) VALUES ('file10.dxf');