CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('drivers_license.jpg'), ('passport.jpg'), ('school_id.png'), ('utility_bill.png'), ('certificate.jpg'), ('resume.pdf'), ('bank_statement.pdf'), ('insurance_card.jpg'), ('library_card.pdf'), ('birth_certificate.png');