CREATE TABLE documents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  size INT NOT NULL,
  type VARCHAR(50) NOT NULL
);

INSERT INTO documents (filename, size, type) VALUES ('driver_license.jpg', 1024, 'image/jpg');
INSERT INTO documents (filename, size, type) VALUES ('passport.jpeg', 2048, 'image/jpeg');
INSERT INTO documents (filename, size, type) VALUES ('id_card.png', 1536, 'image/png');
INSERT INTO documents (filename, size, type) VALUES ('bill.gif', 512, 'image/gif');
INSERT INTO documents (filename, size, type) VALUES ('certificate.jpg', 4096, 'image/jpg');
INSERT INTO documents (filename, size, type) VALUES ('resume.pdf', 1024, 'application/pdf');
INSERT INTO documents (filename, size, type) VALUES ('medical_report.png', 3072, 'image/png');
INSERT INTO documents (filename, size, type) VALUES ('contract.pdf', 2048, 'application/pdf');
INSERT INTO documents (filename, size, type) VALUES ('invoice.jpg', 2560, 'image/jpg');
INSERT INTO documents (filename, size, type) VALUES ('letter.docx', 4096, 'application/msword');
