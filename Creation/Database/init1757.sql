CREATE TABLE IF NOT EXISTS documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(30) NOT NULL,
  filetype VARCHAR(30) NOT NULL,
  filesize INT NOT NULL,
  reg_date TIMESTAMP
);

-- Insert sample data into documents table
INSERT INTO documents (filename, filetype, filesize) VALUES ('example1.jpg', 'image/jpeg', 1024);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example2.png', 'image/png', 2048);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example3.docx', 'application/msword', 3072);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example4.pdf', 'application/pdf', 4096);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example5.jpeg', 'image/jpeg', 5120);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example6.png', 'image/png', 6144);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example7.docx', 'application/msword', 7168);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example8.pdf', 'application/pdf', 8192);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example9.jpg', 'image/jpeg', 9216);
INSERT INTO documents (filename, filetype, filesize) VALUES ('example10.png', 'image/png', 10240);
