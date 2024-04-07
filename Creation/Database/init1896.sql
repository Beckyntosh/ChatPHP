CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(30) NOT NULL,
    file_name VARCHAR(100) NOT NULL,
    upload_date TIMESTAMP
);

INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Alpha', 'alpha.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Beta', 'beta.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Gamma', 'gamma.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Delta', 'delta.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Epsilon', 'epsilon.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Zeta', 'zeta.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Eta', 'eta.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Theta', 'theta.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Iota', 'iota.zip', NOW());
INSERT INTO project_archives (project_name, file_name, upload_date) VALUES ('Project Kappa', 'kappa.zip', NOW());