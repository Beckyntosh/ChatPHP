CREATE TABLE vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_files (filename, filepath) VALUES ('file1.svg', 'uploads/file1.svg');
INSERT INTO vector_files (filename, filepath) VALUES ('file2.ai', 'uploads/file2.ai');
INSERT INTO vector_files (filename, filepath) VALUES ('file3.eps', 'uploads/file3.eps');
INSERT INTO vector_files (filename, filepath) VALUES ('file4.svg', 'uploads/file4.svg');
INSERT INTO vector_files (filename, filepath) VALUES ('file5.ai', 'uploads/file5.ai');
INSERT INTO vector_files (filename, filepath) VALUES ('file6.eps', 'uploads/file6.eps');
INSERT INTO vector_files (filename, filepath) VALUES ('file7.svg', 'uploads/file7.svg');
INSERT INTO vector_files (filename, filepath) VALUES ('file8.ai', 'uploads/file8.ai');
INSERT INTO vector_files (filename, filepath) VALUES ('file9.eps', 'uploads/file9.eps');
INSERT INTO vector_files (filename, filepath) VALUES ('file10.svg', 'uploads/file10.svg');
