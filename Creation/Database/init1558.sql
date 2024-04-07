CREATE TABLE IF NOT EXISTS scanned_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(256) NOT NULL,
    file_path VARCHAR(256) NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    file_size INT UNSIGNED,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense1.pdf', 'uploads/DriverLicense1.pdf', 'pdf', 1024);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense2.jpg', 'uploads/DriverLicense2.jpg', 'jpg', 2048);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense3.jpeg', 'uploads/DriverLicense3.jpeg', 'jpeg', 3072);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense4.png', 'uploads/DriverLicense4.png', 'png', 4096);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense5.pdf', 'uploads/DriverLicense5.pdf', 'pdf', 5120);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense6.jpg', 'uploads/DriverLicense6.jpg', 'jpg', 6144);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense7.jpeg', 'uploads/DriverLicense7.jpeg', 'jpeg', 7168);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense8.png', 'uploads/DriverLicense8.png', 'png', 8192);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense9.pdf', 'uploads/DriverLicense9.pdf', 'pdf', 9216);
INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES ('DriverLicense10.jpg', 'uploads/DriverLicense10.jpg', 'jpg', 10240);
