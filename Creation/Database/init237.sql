CREATE TABLE IF NOT EXISTS cad_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO cad_files (filename) VALUES ('file1.stl');
INSERT INTO cad_files (filename) VALUES ('file2.obj');
INSERT INTO cad_files (filename) VALUES ('file3.cad');
INSERT INTO cad_files (filename) VALUES ('file4.stl');
INSERT INTO cad_files (filename) VALUES ('file5.obj');
INSERT INTO cad_files (filename) VALUES ('file6.cad');
INSERT INTO cad_files (filename) VALUES ('file7.stl');
INSERT INTO cad_files (filename) VALUES ('file8.obj');
INSERT INTO cad_files (filename) VALUES ('file9.cad');
INSERT INTO cad_files (filename) VALUES ('file10.stl');
