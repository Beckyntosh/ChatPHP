CREATE TABLE IF NOT EXISTS document_uploads (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO document_uploads (file_name) VALUES ('drivers_license.jpg');
INSERT INTO document_uploads (file_name) VALUES ('passport.pdf');
INSERT INTO document_uploads (file_name) VALUES ('health_certificate.png');
INSERT INTO document_uploads (file_name) VALUES ('funny_selfie.jpg');
INSERT INTO document_uploads (file_name) VALUES ('medical_report.pdf');
INSERT INTO document_uploads (file_name) VALUES ('wellness_brochure.pdf');
INSERT INTO document_uploads (file_name) VALUES ('yoga_certificate.jpg');
INSERT INTO document_uploads (file_name) VALUES ('meditation_guide.pdf');
INSERT INTO document_uploads (file_name) VALUES ('laughter_therapy.png');
INSERT INTO document_uploads (file_name) VALUES ('nutrition_plan.pdf');
