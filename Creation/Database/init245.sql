CREATE TABLE IF NOT EXISTS vector_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
);

INSERT INTO vector_files (filename) VALUES ('file1.svg'), ('file2.svg'), ('file3.svg'), ('file4.svg'), ('file5.svg'), ('file6.svg'), ('file7.svg'), ('file8.svg'), ('file9.svg'), ('file10.svg');