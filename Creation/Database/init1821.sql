CREATE TABLE IF NOT EXISTS uploaded_texts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    sentiment VARCHAR(50),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example1.txt', 'Positive');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example2.doc', 'Positive');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example3.docx', 'Negative');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example4.txt', 'Positive');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example5.doc', 'Negative');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example6.docx', 'Positive');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example7.txt', 'Negative');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example8.doc', 'Positive');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example9.docx', 'Negative');
INSERT INTO uploaded_texts (file_name, sentiment) VALUES ('example10.txt', 'Positive');