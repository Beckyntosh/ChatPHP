CREATE TABLE uploaded_documents (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document1.jpg', 'uploads/document1.jpg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document2.png', 'uploads/document2.png');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document3.jpeg', 'uploads/document3.jpeg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document4.gif', 'uploads/document4.gif');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document5.pdf', 'uploads/document5.pdf');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document6.jpg', 'uploads/document6.jpg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document7.png', 'uploads/document7.png');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document8.jpeg', 'uploads/document8.jpeg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document9.gif', 'uploads/document9.gif');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document10.pdf', 'uploads/document10.pdf');