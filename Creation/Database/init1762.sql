CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense1.jpg', 'uploads/DriverLicense1.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense2.png', 'uploads/DriverLicense2.png');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense3.pdf', 'uploads/DriverLicense3.pdf');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense4.jpeg', 'uploads/DriverLicense4.jpeg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense5.jpg', 'uploads/DriverLicense5.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense6.pdf', 'uploads/DriverLicense6.pdf');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense7.png', 'uploads/DriverLicense7.png');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense8.jpg', 'uploads/DriverLicense8.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense9.pdf', 'uploads/DriverLicense9.pdf');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('DriverLicense10.png', 'uploads/DriverLicense10.png');
