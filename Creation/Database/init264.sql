CREATE TABLE IF NOT EXISTS backup_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO backup_files (file_name) VALUES ('backup1.sql');
INSERT INTO backup_files (file_name) VALUES ('backup2.sql');
INSERT INTO backup_files (file_name) VALUES ('backup3.sql');
INSERT INTO backup_files (file_name) VALUES ('backup4.sql');
INSERT INTO backup_files (file_name) VALUES ('backup5.sql');
INSERT INTO backup_files (file_name) VALUES ('backup6.sql');
INSERT INTO backup_files (file_name) VALUES ('backup7.sql');
INSERT INTO backup_files (file_name) VALUES ('backup8.sql');
INSERT INTO backup_files (file_name) VALUES ('backup9.sql');
INSERT INTO backup_files (file_name) VALUES ('backup10.sql');
