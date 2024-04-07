CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    filesize INT(10) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, filetype, filesize)
VALUES ('DriverLicense.pdf', 'pdf', 1024),
       ('Passport.jpg', 'jpg', 2048),
       ('IDCard.png', 'png', 1536),
       ('ProofOfAddress.doc', 'doc', 3072),
       ('MedicalRecord.pdf', 'pdf', 4096),
       ('UtilityBill.jpg', 'jpg', 5120),
       ('InsuranceCard.png', 'png', 6144),
       ('CreditReport.pdf', 'pdf', 7168),
       ('TaxReturn.doc', 'doc', 8192),
       ('LegalDocument.pdf', 'pdf', 9216);
