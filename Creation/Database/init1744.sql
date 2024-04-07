CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_docs (filename, file_path) VALUES ('license1.jpg', 'uploads/license1.jpg');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license2.png', 'uploads/license2.png');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license3.pdf', 'uploads/license3.pdf');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license4.jpg', 'uploads/license4.jpg');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license5.pdf', 'uploads/license5.pdf');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license6.jpg', 'uploads/license6.jpg');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license7.pdf', 'uploads/license7.pdf');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license8.jpg', 'uploads/license8.jpg');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license9.png', 'uploads/license9.png');
INSERT INTO uploaded_docs (filename, file_path) VALUES ('license10.pdf', 'uploads/license10.pdf');
