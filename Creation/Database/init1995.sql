CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape1.jpg', 'uploads/landscape1.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape2.jpg', 'uploads/landscape2.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape3.jpg', 'uploads/landscape3.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape4.jpg', 'uploads/landscape4.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape5.jpg', 'uploads/landscape5.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape6.jpg', 'uploads/landscape6.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape7.jpg', 'uploads/landscape7.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape8.jpg', 'uploads/landscape8.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape9.jpg', 'uploads/landscape9.jpg');
INSERT INTO uploaded_files (filename, file_path) VALUES ('landscape10.jpg', 'uploads/landscape10.jpg');
