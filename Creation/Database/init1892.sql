CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(500) NOT NULL,
    file_name VARCHAR(500) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO project_archives (project_name, file_name) VALUES ('Project Alpha', 'Project_Alpha.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Beta', 'Project_Beta.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Gamma', 'Project_Gamma.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Delta', 'Project_Delta.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Epsilon', 'Project_Epsilon.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Zeta', 'Project_Zeta.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Eta', 'Project_Eta.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Theta', 'Project_Theta.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Iota', 'Project_Iota.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Kappa', 'Project_Kappa.zip');
