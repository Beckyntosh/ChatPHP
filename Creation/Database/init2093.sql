CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, file_path) VALUES ('document1.jpg', 'uploads/document1.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document2.jpg', 'uploads/document2.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document3.jpg', 'uploads/document3.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document4.jpg', 'uploads/document4.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document5.jpg', 'uploads/document5.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document6.jpg', 'uploads/document6.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document7.jpg', 'uploads/document7.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document8.jpg', 'uploads/document8.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document9.jpg', 'uploads/document9.jpg');
INSERT INTO uploaded_documents (filename, file_path) VALUES ('document10.jpg', 'uploads/document10.jpg');