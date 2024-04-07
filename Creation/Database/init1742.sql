CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  filepath VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP
);

INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_1.jpg', 'uploads/document_1.jpg', '2022-03-01 08:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_2.png', 'uploads/document_2.png', '2022-03-02 09:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_3.jpeg', 'uploads/document_3.jpeg', '2022-03-03 10:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_4.pdf', 'uploads/document_4.pdf', '2022-03-04 11:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_5.gif', 'uploads/document_5.gif', '2022-03-05 12:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_6.jpg', 'uploads/document_6.jpg', '2022-03-06 13:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_7.png', 'uploads/document_7.png', '2022-03-07 14:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_8.jpeg', 'uploads/document_8.jpeg', '2022-03-08 15:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_9.pdf', 'uploads/document_9.pdf', '2022-03-09 16:00:00');
INSERT INTO uploaded_documents (filename, filepath, upload_time) VALUES ('document_10.gif', 'uploads/document_10.gif', '2022-03-10 17:00:00');