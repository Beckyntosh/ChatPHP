CREATE TABLE IF NOT EXISTS text_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO text_files (file_name) VALUES ('example1.txt');
INSERT INTO text_files (file_name) VALUES ('document2.txt');
INSERT INTO text_files (file_name) VALUES ('file3.txt');
INSERT INTO text_files (file_name) VALUES ('upload4.txt');
INSERT INTO text_files (file_name) VALUES ('sample5.txt');
INSERT INTO text_files (file_name) VALUES ('textfile6.txt');
INSERT INTO text_files (file_name) VALUES ('analysis7.txt');
INSERT INTO text_files (file_name) VALUES ('content8.txt');
INSERT INTO text_files (file_name) VALUES ('sentiment9.txt');
INSERT INTO text_files (file_name) VALUES ('jewelry10.txt');
