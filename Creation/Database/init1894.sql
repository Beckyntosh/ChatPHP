CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    archive_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Alpha', 'archive1.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Beta', 'archive2.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Gamma', 'archive3.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Delta', 'archive4.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Epsilon', 'archive5.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Zeta', 'archive6.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Eta', 'archive7.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Theta', 'archive8.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Iota', 'archive9.zip');
INSERT INTO project_archives (project_name, archive_name) VALUES ('Project Kappa', 'archive10.zip');
