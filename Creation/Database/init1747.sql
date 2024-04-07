CREATE TABLE IF NOT EXISTS documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO documents (user_id, filename) VALUES (1, 'DriverLicense1.jpg');
INSERT INTO documents (user_id, filename) VALUES (1, 'DriverLicense2.png');
INSERT INTO documents (user_id, filename) VALUES (1, 'DriverLicense3.jpeg');
INSERT INTO documents (user_id, filename) VALUES (2, 'IDCard1.jpg');
INSERT INTO documents (user_id, filename) VALUES (2, 'IDCard2.png');
INSERT INTO documents (user_id, filename) VALUES (2, 'IDCard3.jpeg');
INSERT INTO documents (user_id, filename) VALUES (3, 'Passport1.jpg');
INSERT INTO documents (user_id, filename) VALUES (3, 'Passport2.png');
INSERT INTO documents (user_id, filename) VALUES (3, 'Passport3.jpeg');
INSERT INTO documents (user_id, filename) VALUES (4, 'Visa1.jpg');
INSERT INTO documents (user_id, filename) VALUES (4, 'Visa2.png');
INSERT INTO documents (user_id, filename) VALUES (4, 'Visa3.jpeg');
INSERT INTO documents (user_id, filename) VALUES (5, 'ResidencePermit1.jpg');
INSERT INTO documents (user_id, filename) VALUES (5, 'ResidencePermit2.png');
INSERT INTO documents (user_id, filename) VALUES (5, 'ResidencePermit3.jpeg');