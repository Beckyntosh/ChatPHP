CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO invoices (filename) VALUES ('January 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('February 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('March 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('April 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('May 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('June 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('July 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('August 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('September 2024 Service Invoice');
INSERT INTO invoices (filename) VALUES ('October 2024 Service Invoice');
