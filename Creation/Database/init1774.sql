CREATE TABLE IF NOT EXISTS Invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
invoice_name VARCHAR(50) NOT NULL,
file_name VARCHAR(100) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Invoices (invoice_name, file_name) VALUES ('January 2024 Service Invoice', 'january_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('February 2024 Service Invoice', 'february_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('March 2024 Service Invoice', 'march_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('April 2024 Service Invoice', 'april_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('May 2024 Service Invoice', 'may_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('June 2024 Service Invoice', 'june_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('July 2024 Service Invoice', 'july_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('August 2024 Service Invoice', 'august_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('September 2024 Service Invoice', 'september_2024_invoice.pdf');
INSERT INTO Invoices (invoice_name, file_name) VALUES ('October 2024 Service Invoice', 'october_2024_invoice.pdf');
