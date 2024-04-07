CREATE TABLE IF NOT EXISTS ScannedDocuments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_1.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_2.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_3.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_4.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_5.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_6.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_7.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_8.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_9.jpg');
INSERT INTO ScannedDocuments (filename) VALUES ('driver_license_10.jpg');