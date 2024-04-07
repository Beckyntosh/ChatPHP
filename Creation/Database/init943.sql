CREATE TABLE IF NOT EXISTS files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(30) NOT NULL,
hash VARCHAR(128) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserting values into the files table
INSERT INTO files (filename, hash) VALUES ('file1.txt', 'hash1');
INSERT INTO files (filename, hash) VALUES ('file2.txt', 'hash2');
INSERT INTO files (filename, hash) VALUES ('file3.txt', 'hash3');
INSERT INTO files (filename, hash) VALUES ('file4.txt', 'hash4');
INSERT INTO files (filename, hash) VALUES ('file5.txt', 'hash5');
INSERT INTO files (filename, hash) VALUES ('file6.txt', 'hash6');
INSERT INTO files (filename, hash) VALUES ('file7.txt', 'hash7');
INSERT INTO files (filename, hash) VALUES ('file8.txt', 'hash8');
INSERT INTO files (filename, hash) VALUES ('file9.txt', 'hash9');
INSERT INTO files (filename, hash) VALUES ('file10.txt', 'hash10');