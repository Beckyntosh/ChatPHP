CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL
);

CREATE TABLE archived_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    file_name VARCHAR(255) NOT NULL,
    file_size INT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id)
);

INSERT INTO projects (project_name) VALUES
('Project Alpha'),
('Project Beta'),
('Project Gamma'),
('Project Delta'),
('Project Epsilon'),
('Project Zeta'),
('Project Eta'),
('Project Theta'),
('Project Iota'),
('Project Kappa');

INSERT INTO archived_files (project_id, file_name, file_size) VALUES
(1, 'file1.zip', 1024),
(1, 'file2.zip', 2048),
(2, 'file3.zip', 3072),
(2, 'file4.zip', 4096),
(3, 'file5.zip', 5120),
(3, 'file6.zip', 6144),
(4, 'file7.zip', 7168),
(4, 'file8.zip', 8192),
(5, 'file9.zip', 9216),
(5, 'file10.zip', 10240);
