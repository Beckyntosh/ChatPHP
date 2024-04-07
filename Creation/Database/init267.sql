CREATE TABLE email_attachments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO email_attachments (filename, file_path) VALUES ('document1.pdf', '/uploads/document1.pdf');
INSERT INTO email_attachments (filename, file_path) VALUES ('image1.jpg', '/uploads/image1.jpg');
INSERT INTO email_attachments (filename, file_path) VALUES ('document2.docx', '/uploads/document2.docx');
INSERT INTO email_attachments (filename, file_path) VALUES ('document3.pdf', '/uploads/document3.pdf');
INSERT INTO email_attachments (filename, file_path) VALUES ('image2.png', '/uploads/image2.png');
INSERT INTO email_attachments (filename, file_path) VALUES ('document4.docx', '/uploads/document4.docx');
INSERT INTO email_attachments (filename, file_path) VALUES ('image3.jpg', '/uploads/image3.jpg');
INSERT INTO email_attachments (filename, file_path) VALUES ('document5.pdf', '/uploads/document5.pdf');
INSERT INTO email_attachments (filename, file_path) VALUES ('image4.png', '/uploads/image4.png');
INSERT INTO email_attachments (filename, file_path) VALUES ('document6.docx', '/uploads/document6.docx');
