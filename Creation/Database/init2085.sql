CREATE TABLE IF NOT EXISTS UploadedDocuments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense1.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense2.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense3.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense4.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense5.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense6.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense7.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense8.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense9.jpg');
INSERT INTO UploadedDocuments (filename) VALUES ('DriverLicense10.jpg');