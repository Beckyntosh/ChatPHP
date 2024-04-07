CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense1.jpg', 'uploads/DriverLicense1.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense2.jpg', 'uploads/DriverLicense2.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense3.jpg', 'uploads/DriverLicense3.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense4.jpg', 'uploads/DriverLicense4.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense5.jpg', 'uploads/DriverLicense5.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense6.jpg', 'uploads/DriverLicense6.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense7.jpg', 'uploads/DriverLicense7.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense8.jpg', 'uploads/DriverLicense8.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense9.jpg', 'uploads/DriverLicense9.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense10.jpg', 'uploads/DriverLicense10.jpg');
