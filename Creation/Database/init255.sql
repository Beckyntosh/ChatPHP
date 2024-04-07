CREATE TABLE config_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO config_files (filename) VALUES ('file1.txt');
INSERT INTO config_files (filename) VALUES ('file2.txt');
INSERT INTO config_files (filename) VALUES ('file3.json');
INSERT INTO config_files (filename) VALUES ('file4.json');
INSERT INTO config_files (filename) VALUES ('file5.txt');
INSERT INTO config_files (filename) VALUES ('file6.json');
INSERT INTO config_files (filename) VALUES ('file7.txt');
INSERT INTO config_files (filename) VALUES ('file8.json');
INSERT INTO config_files (filename) VALUES ('file9.txt');
INSERT INTO config_files (filename) VALUES ('file10.json');
