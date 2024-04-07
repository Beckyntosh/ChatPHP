CREATE TABLE IF NOT EXISTS file_archive (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(255) NOT NULL,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP
);

INSERT INTO file_archive (project_name, file_name) VALUES ('Project Alpha', 'Project_Alpha_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Beta', 'Project_Beta_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Gamma', 'Project_Gamma_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Delta', 'Project_Delta_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Epsilon', 'Project_Epsilon_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Zeta', 'Project_Zeta_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Theta', 'Project_Theta_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Iota', 'Project_Iota_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Kappa', 'Project_Kappa_Documents.zip');
INSERT INTO file_archive (project_name, file_name) VALUES ('Project Lambda', 'Project_Lambda_Documents.zip');
