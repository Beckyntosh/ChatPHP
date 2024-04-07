CREATE TABLE IF NOT EXISTS archived_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    size INT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert at least 10 values into the table
INSERT INTO archived_files (name, path, size) VALUES ('file1.zip', 'uploads/file1.zip', 1024);
INSERT INTO archived_files (name, path, size) VALUES ('file2.zip', 'uploads/file2.zip', 2048);
INSERT INTO archived_files (name, path, size) VALUES ('file3.zip', 'uploads/file3.zip', 3072);
INSERT INTO archived_files (name, path, size) VALUES ('file4.zip', 'uploads/file4.zip', 4096);
INSERT INTO archived_files (name, path, size) VALUES ('file5.zip', 'uploads/file5.zip', 5120);
INSERT INTO archived_files (name, path, size) VALUES ('file6.zip', 'uploads/file6.zip', 6144);
INSERT INTO archived_files (name, path, size) VALUES ('file7.zip', 'uploads/file7.zip', 7168);
INSERT INTO archived_files (name, path, size) VALUES ('file8.zip', 'uploads/file8.zip', 8192);
INSERT INTO archived_files (name, path, size) VALUES ('file9.zip', 'uploads/file9.zip', 9216);
INSERT INTO archived_files (name, path, size) VALUES ('file10.zip', 'uploads/file10.zip', 10240);
