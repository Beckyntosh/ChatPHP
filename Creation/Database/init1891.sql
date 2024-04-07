CREATE TABLE IF NOT EXISTS project_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(30) NOT NULL,
    file_name VARCHAR(100) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO project_files (project_name, file_name) VALUES ('Project Alpha', 'file1.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Beta', 'file2.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Gamma', 'file3.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Delta', 'file4.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Epsilon', 'file5.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Zeta', 'file6.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Eta', 'file7.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Theta', 'file8.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Iota', 'file9.zip');
INSERT INTO project_files (project_name, file_name) VALUES ('Project Kappa', 'file10.zip');
