CREATE TABLE IF NOT EXISTS document_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license1.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license2.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license3.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license4.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license5.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license6.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license7.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license8.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license9.jpg');
INSERT INTO document_uploads (filename) VALUES ('uploads/driver_license10.jpg');
