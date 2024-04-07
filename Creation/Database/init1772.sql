CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_name VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO invoices (invoice_name, file_name) VALUES ('January 2024 Service Invoice', 'service_invoice.pdf');
INSERT INTO invoices (invoice_name, file_name) VALUES ('February 2024 Product Invoice', 'product_invoice.jpg');
INSERT INTO invoices (invoice_name, file_name) VALUES ('March 2024 Beauty Invoice', 'beauty_invoice.png');
INSERT INTO invoices (invoice_name, file_name) VALUES ('April 2024 Makeup Invoice', 'makeup_invoice.pdf');
INSERT INTO invoices (invoice_name, file_name) VALUES ('May 2024 Skincare Invoice', 'skincare_invoice.jpg');
INSERT INTO invoices (invoice_name, file_name) VALUES ('June 2024 Haircare Invoice', 'haircare_invoice.jpg');
INSERT INTO invoices (invoice_name, file_name) VALUES ('July 2024 Fragrance Invoice', 'fragrance_invoice.png');
INSERT INTO invoices (invoice_name, file_name) VALUES ('August 2024 Nail Care Invoice', 'nailcare_invoice.pdf');
INSERT INTO invoices (invoice_name, file_name) VALUES ('September 2024 Spa Invoice', 'spa_invoice.jpg');
INSERT INTO invoices (invoice_name, file_name) VALUES ('October 2024 Wellness Invoice', 'wellness_invoice.pdf');
