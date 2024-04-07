CREATE TABLE IF NOT EXISTS driver_license_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO driver_license_uploads (filename) VALUES ('license1.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license2.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license3.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license4.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license5.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license6.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license7.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license8.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license9.pdf');
INSERT INTO driver_license_uploads (filename) VALUES ('license10.pdf');
