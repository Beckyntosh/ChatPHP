CREATE TABLE archives (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      project_name VARCHAR(255) NOT NULL,
      file_name VARCHAR(255) NOT NULL,
      upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

INSERT INTO archives (project_name, file_name) VALUES ('Project Alpha', 'document1.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Beta', 'document2.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Gamma', 'document3.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Delta', 'document4.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Epsilon', 'document5.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Zeta', 'document6.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Eta', 'document7.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Theta', 'document8.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Iota', 'document9.zip');
INSERT INTO archives (project_name, file_name) VALUES ('Project Kappa', 'document10.zip');
