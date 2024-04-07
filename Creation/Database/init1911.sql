CREATE TABLE IF NOT EXISTS zip_archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO zip_archives (file_name) VALUES ('Project1.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project2.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project3.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project4.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project5.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project6.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project7.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project8.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project9.zip');
INSERT INTO zip_archives (file_name) VALUES ('Project10.zip');
