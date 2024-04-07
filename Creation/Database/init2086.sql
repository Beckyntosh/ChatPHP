CREATE TABLE uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  document_name VARCHAR(50) NOT NULL,
  document_path VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Driver License 1', 'uploads/driver_license_1.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Driver License 2', 'uploads/driver_license_2.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Passport 1', 'uploads/passport_1.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Passport 2', 'uploads/passport_2.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('ID Card 1', 'uploads/id_card_1.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('ID Card 2', 'uploads/id_card_2.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Certificate 1', 'uploads/certificate_1.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Certificate 2', 'uploads/certificate_2.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Visa 1', 'uploads/visa_1.jpg');
INSERT INTO uploaded_documents (document_name, document_path) VALUES ('Visa 2', 'uploads/visa_2.jpg');
