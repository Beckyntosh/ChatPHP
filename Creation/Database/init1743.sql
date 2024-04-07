CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL
);

INSERT INTO documents (filename) VALUES ('uploads/driver_license.jpg');
INSERT INTO documents (filename) VALUES ('uploads/passport.jpg');
INSERT INTO documents (filename) VALUES ('uploads/id_card.jpg');
INSERT INTO documents (filename) VALUES ('uploads/resume.pdf');
INSERT INTO documents (filename) VALUES ('uploads/degree_certificate.jpg');
INSERT INTO documents (filename) VALUES ('uploads/birth_certificate.pdf');
INSERT INTO documents (filename) VALUES ('uploads/utility_bill.jpg');
INSERT INTO documents (filename) VALUES ('uploads/medical_report.pdf');
INSERT INTO documents (filename) VALUES ('uploads/insurance_policy.pdf');
INSERT INTO documents (filename) VALUES ('uploads/property_deed.jpg');
