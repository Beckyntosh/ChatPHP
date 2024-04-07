CREATE TABLE project_archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255),
    archive_name VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Alpha', 'file1.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Beta', 'file2.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Gamma', 'file3.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Delta', 'file4.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Epsilon', 'file5.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Zeta', 'file6.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Eta', 'file7.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Theta', 'file8.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Iota', 'file9.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Kappa', 'file10.zip');
