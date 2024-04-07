CREATE TABLE IF NOT EXISTS scanned_docs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL
);

INSERT INTO scanned_docs (filename) VALUES ('uploads/driver_license.jpg');
INSERT INTO scanned_docs (filename) VALUES ('uploads/passport.jpg');
INSERT INTO scanned_docs (filename) VALUES ('uploads/id_card.jpg');
INSERT INTO scanned_docs (filename) VALUES ('uploads/resume.pdf');
INSERT INTO scanned_docs (filename) VALUES ('uploads/birth_certificate.jpg');
INSERT INTO scanned_docs (filename) VALUES ('uploads/utility_bill.pdf');
INSERT INTO scanned_docs (filename) VALUES ('uploads/insurance_card.jpg');
INSERT INTO scanned_docs (filename) VALUES ('uploads/medical_report.pdf');
INSERT INTO scanned_docs (filename) VALUES ('uploads/academic_transcript.pdf');
INSERT INTO scanned_docs (filename) VALUES ('uploads/deed_of_sale.jpg');
