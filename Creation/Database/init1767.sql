CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('driver_license1.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license2.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license3.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license4.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license5.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license6.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license7.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license8.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license9.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('driver_license10.pdf');
