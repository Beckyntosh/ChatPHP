CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    archive_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Alpha', 'Archive1.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Beta', 'Archive2.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Gamma', 'Archive3.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Delta', 'Archive4.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Epsilon', 'Archive5.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Zeta', 'Archive6.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Eta', 'Archive7.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Theta', 'Archive8.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Iota', 'Archive9.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Kappa', 'Archive10.zip');
