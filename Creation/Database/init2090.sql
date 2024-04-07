CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (file_name) VALUES ('document1.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('document2.jpeg');
INSERT INTO uploaded_documents (file_name) VALUES ('document3.png');
INSERT INTO uploaded_documents (file_name) VALUES ('document4.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('document5.jpeg');
INSERT INTO uploaded_documents (file_name) VALUES ('document6.png');
INSERT INTO uploaded_documents (file_name) VALUES ('document7.jpg');
INSERT INTO uploaded_documents (file_name) VALUES ('document8.jpeg');
INSERT INTO uploaded_documents (file_name) VALUES ('document9.png');
INSERT INTO uploaded_documents (file_name) VALUES ('document10.jpg');
