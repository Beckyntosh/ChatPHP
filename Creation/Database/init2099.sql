CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, filepath) VALUES ('license1.jpg', 'uploads/license1.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license2.jpg', 'uploads/license2.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license3.jpg', 'uploads/license3.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license4.jpg', 'uploads/license4.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license5.jpg', 'uploads/license5.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license6.jpg', 'uploads/license6.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license7.jpg', 'uploads/license7.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license8.jpg', 'uploads/license8.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license9.jpg', 'uploads/license9.jpg');
INSERT INTO uploaded_documents (filename, filepath) VALUES ('license10.jpg', 'uploads/license10.jpg');
