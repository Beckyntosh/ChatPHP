CREATE TABLE IF NOT EXISTS uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
);

INSERT INTO uploads (filename) VALUES ('Lease Agreement');
INSERT INTO uploads (filename) VALUES ('Employment Contract');
INSERT INTO uploads (filename) VALUES ('Non-Disclosure Agreement');
INSERT INTO uploads (filename) VALUES ('Privacy Policy');
INSERT INTO uploads (filename) VALUES ('Terms and Conditions');
INSERT INTO uploads (filename) VALUES ('Service Agreement');
INSERT INTO uploads (filename) VALUES ('Rental Agreement');
INSERT INTO uploads (filename) VALUES ('Purchase Order');
INSERT INTO uploads (filename) VALUES ('Invoice');
INSERT INTO uploads (filename) VALUES ('Partnership Agreement');
