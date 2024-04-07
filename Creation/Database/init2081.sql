CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_date TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('uploads/document1.jpg'), ('uploads/document2.jpg'), ('uploads/document3.jpg'), ('uploads/document4.jpg'), ('uploads/document5.jpg'), ('uploads/document6.jpg'), ('uploads/document7.jpg'), ('uploads/document8.jpg'), ('uploads/document9.jpg'), ('uploads/document10.jpg');
