CREATE TABLE IF NOT EXISTS scanned_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (filename) VALUES ('driver_license_1.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_2.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_3.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_4.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_5.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_6.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_7.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_8.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_9.pdf');
INSERT INTO scanned_documents (filename) VALUES ('driver_license_10.pdf');
