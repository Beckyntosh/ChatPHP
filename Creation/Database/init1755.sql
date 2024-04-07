CREATE TABLE IF NOT EXISTS scanned_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (filename, file_type) VALUES ('document1.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document2.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document3.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document4.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document5.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document6.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document7.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document8.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document9.jpg', 'DriverLicense');
INSERT INTO scanned_documents (filename, file_type) VALUES ('document10.jpg', 'DriverLicense');
