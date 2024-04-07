CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    document_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense1.pdf', 'uploads/DriverLicense1.pdf');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense2.jpg', 'uploads/DriverLicense2.jpg');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense3.png', 'uploads/DriverLicense3.png');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense4.pdf', 'uploads/DriverLicense4.pdf');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense5.jpg', 'uploads/DriverLicense5.jpg');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense6.png', 'uploads/DriverLicense6.png');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense7.pdf', 'uploads/DriverLicense7.pdf');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense8.jpg', 'uploads/DriverLicense8.jpg');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense9.png', 'uploads/DriverLicense9.png');

INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (1, 'DriverLicense10.pdf', 'uploads/DriverLicense10.pdf');