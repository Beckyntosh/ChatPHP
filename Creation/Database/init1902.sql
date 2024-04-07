CREATE TABLE IF NOT EXISTS archived_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Alpha', 'file1.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Beta', 'file2.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Gamma', 'file3.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Delta', 'file4.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Epsilon', 'file5.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Zeta', 'file6.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Eta', 'file7.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Theta', 'file8.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Iota', 'file9.zip', NOW());
INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('Project Kappa', 'file10.zip', NOW());
