CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_files (file_name) VALUES ('file1.svg');
INSERT INTO vector_files (file_name) VALUES ('file2.ai');
INSERT INTO vector_files (file_name) VALUES ('file3.eps');
INSERT INTO vector_files (file_name) VALUES ('file4.pdf');
INSERT INTO vector_files (file_name) VALUES ('file5.svg');
INSERT INTO vector_files (file_name) VALUES ('file6.ai');
INSERT INTO vector_files (file_name) VALUES ('file7.eps');
INSERT INTO vector_files (file_name) VALUES ('file8.pdf');
INSERT INTO vector_files (file_name) VALUES ('file9.svg');
INSERT INTO vector_files (file_name) VALUES ('file10.ai');
