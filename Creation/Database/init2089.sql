CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_docs (file_name) VALUES ('example1.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example2.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example3.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example4.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example5.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example6.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example7.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example8.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example9.jpg');
INSERT INTO uploaded_docs (file_name) VALUES ('example10.jpg');
