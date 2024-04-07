CREATE TABLE IF NOT EXISTS scanned_docs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data into the scanned_docs table
INSERT INTO scanned_docs (file_name) VALUES ('driver_license1.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license2.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license3.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license4.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license5.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license6.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license7.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license8.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license9.jpg');
INSERT INTO scanned_docs (file_name) VALUES ('driver_license10.jpg');
