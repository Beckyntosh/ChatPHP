CREATE TABLE IF NOT EXISTS invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
invoice_name VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
);

INSERT INTO invoices (invoice_name, upload_date) VALUES ('January 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('February 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('March 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('April 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('May 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('June 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('July 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('August 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('September 2024 Service Invoice', NOW());
INSERT INTO invoices (invoice_name, upload_date) VALUES ('October 2024 Service Invoice', NOW());