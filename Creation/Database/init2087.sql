CREATE TABLE IF NOT EXISTS scanned_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (filename) VALUES ('Driver_License.jpg'), ('Passport.pdf'), ('ID_Card.jpg'), ('Insurance_Card.png'), ('Certificate.pdf'), ('Membership_Card.jpg'), ('Visa.jpg'), ('Degree_Certificate.pdf'), ('Library_Card.jpg'), ('Health_Insurance.pdf');
