CREATE TABLE uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('DriverLicense.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('Passport.png');
INSERT INTO uploaded_documents (filename) VALUES ('IDCard.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('LibraryCard.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('BirthCertificate.png');
INSERT INTO uploaded_documents (filename) VALUES ('UtilityBill.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('SchoolTranscript.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('MedicalReport.png');
INSERT INTO uploaded_documents (filename) VALUES ('BankStatement.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('InsurancePolicy.pdf');