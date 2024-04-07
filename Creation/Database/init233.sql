CREATE TABLE IF NOT EXISTS source_code_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO source_code_files (filename, filepath) VALUES ('file1.php', 'uploads/file1.php');
INSERT INTO source_code_files (filename, filepath) VALUES ('file2.html', 'uploads/file2.html');
INSERT INTO source_code_files (filename, filepath) VALUES ('file3.js', 'uploads/file3.js');
INSERT INTO source_code_files (filename, filepath) VALUES ('file4.css', 'uploads/file4.css');
INSERT INTO source_code_files (filename, filepath) VALUES ('file5.php', 'uploads/file5.php');
INSERT INTO source_code_files (filename, filepath) VALUES ('file6.html', 'uploads/file6.html');
INSERT INTO source_code_files (filename, filepath) VALUES ('file7.js', 'uploads/file7.js');
INSERT INTO source_code_files (filename, filepath) VALUES ('file8.css', 'uploads/file8.css');
INSERT INTO source_code_files (filename, filepath) VALUES ('file9.php', 'uploads/file9.php');
INSERT INTO source_code_files (filename, filepath) VALUES ('file10.html', 'uploads/file10.html');
