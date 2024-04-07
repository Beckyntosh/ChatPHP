CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document1.pdf', 'uploaded_files/document1.pdf');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document2.jpg', 'uploaded_files/document2.jpg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document3.png', 'uploaded_files/document3.png');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document4.docx', 'uploaded_files/document4.docx');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document5.pdf', 'uploaded_files/document5.pdf');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document6.jpg', 'uploaded_files/document6.jpg');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document7.png', 'uploaded_files/document7.png');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document8.docx', 'uploaded_files/document8.docx');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document9.pdf', 'uploaded_files/document9.pdf');
INSERT INTO uploaded_documents (file_name, file_path) VALUES ('document10.jpg', 'uploaded_files/document10.jpg');
