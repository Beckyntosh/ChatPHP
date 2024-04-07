CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('driver_license.jpg'), ('passport.png'), ('id_card.jpeg'), ('contract.docx'), ('invoice.pdf'), ('receipt.jpg'), ('certificate.pdf'), ('report.docx'), ('letter.pdf'), ('resume.docx');
