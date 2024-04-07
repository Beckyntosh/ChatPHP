CREATE TABLE IF NOT EXISTS scans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scans (filename) VALUES ('uploads/driver_license_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/passport_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/insurance_card_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/medical_records_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/birth_certificate_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/utility_bill_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/work_id_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/school_id_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/voter_id_1.jpg');
INSERT INTO scans (filename) VALUES ('uploads/residence_permit_1.jpg');