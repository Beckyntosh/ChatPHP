CREATE TABLE uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
path VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense1.jpg', 'upload/DriverLicense1.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense2.jpg', 'upload/DriverLicense2.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense3.jpg', 'upload/DriverLicense3.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense4.jpg', 'upload/DriverLicense4.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense5.jpg', 'upload/DriverLicense5.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense6.jpg', 'upload/DriverLicense6.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense7.jpg', 'upload/DriverLicense7.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense8.jpg', 'upload/DriverLicense8.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense9.jpg', 'upload/DriverLicense9.jpg');
INSERT INTO uploaded_documents (filename, path) VALUES ('DriverLicense10.jpg', 'upload/DriverLicense10.jpg');
