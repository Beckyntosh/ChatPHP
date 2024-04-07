CREATE TABLE IF NOT EXISTS cad_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cad_files (filename) VALUES ('file1.stl');
INSERT INTO cad_files (filename) VALUES ('file2.stl');
INSERT INTO cad_files (filename) VALUES ('file3.cad');
INSERT INTO cad_files (filename) VALUES ('file4.stl');
INSERT INTO cad_files (filename) VALUES ('file5.cad');
INSERT INTO cad_files (filename) VALUES ('file6.stl');
INSERT INTO cad_files (filename) VALUES ('file7.cad');
INSERT INTO cad_files (filename) VALUES ('file8.stl');
INSERT INTO cad_files (filename) VALUES ('file9.cad');
INSERT INTO cad_files (filename) VALUES ('file10.stl');
