CREATE TABLE IF NOT EXISTS project_archives (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
project_name VARCHAR(50) NOT NULL,
file_name VARCHAR(100) NOT NULL,
upload_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO project_archives (project_name, file_name) VALUES ('Project Alpha', 'archive1.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Alpha', 'archive2.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Beta', 'archive3.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Beta', 'archive4.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Gamma', 'archive5.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Gamma', 'archive6.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Delta', 'archive7.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Delta', 'archive8.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Epsilon', 'archive9.zip');
INSERT INTO project_archives (project_name, file_name) VALUES ('Project Epsilon', 'archive10.zip');
