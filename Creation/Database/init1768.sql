CREATE TABLE IF NOT EXISTS documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO documents (filename) VALUES ('Lease Agreement');
INSERT INTO documents (filename) VALUES ('Loan Agreement');
INSERT INTO documents (filename) VALUES ('Property Deed');
INSERT INTO documents (filename) VALUES ('Employment Contract');
INSERT INTO documents (filename) VALUES ('Non-Disclosure Agreement');
INSERT INTO documents (filename) VALUES ('Service Agreement');
INSERT INTO documents (filename) VALUES ('Insurance Policy');
INSERT INTO documents (filename) VALUES ('Rental Agreement');
INSERT INTO documents (filename) VALUES ('Intellectual Property License');
INSERT INTO documents (filename) VALUES ('Sales Agreement');