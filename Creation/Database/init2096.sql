CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_1.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_2.png');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_3.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_4.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_5.png');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_6.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_7.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_8.png');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_9.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense_10.jpg');
