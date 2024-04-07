CREATE TABLE IF NOT EXISTS invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(255) NOT NULL,
filesize INT(10) NOT NULL,
uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO invoices (filename, filetype, filesize) VALUES ('January2024ServiceInvoice.pdf', 'application/pdf', '1024');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('February2024ServiceInvoice.pdf', 'application/pdf', '512');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('March2024ServiceInvoice.pdf', 'application/pdf', '768');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('April2024ServiceInvoice.pdf', 'application/pdf', '2048');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('May2024ServiceInvoice.pdf', 'application/pdf', '1536');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('June2024ServiceInvoice.pdf', 'application/pdf', '3072');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('July2024ServiceInvoice.pdf', 'application/pdf', '2560');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('August2024ServiceInvoice.pdf', 'application/pdf', '4096');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('September2024ServiceInvoice.pdf', 'application/pdf', '3584');
INSERT INTO invoices (filename, filetype, filesize) VALUES ('October2024ServiceInvoice.pdf', 'application/pdf', '4608');