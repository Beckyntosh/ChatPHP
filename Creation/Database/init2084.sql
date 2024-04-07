CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense1.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense2.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense3.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense4.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense5.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense6.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense7.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense8.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense9.pdf');
INSERT INTO uploaded_documents (file_name) VALUES ('DriverLicense10.pdf');