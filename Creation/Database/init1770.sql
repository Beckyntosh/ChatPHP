CREATE TABLE IF NOT EXISTS invoices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    invoice_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO invoices (invoice_name) VALUES ('January 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('February 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('March 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('April 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('May 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('June 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('July 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('August 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('September 2024 Service Invoice');
INSERT INTO invoices (invoice_name) VALUES ('October 2024 Service Invoice');
