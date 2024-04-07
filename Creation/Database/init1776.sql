CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO invoices (filename) VALUES ('January2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('February2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('March2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('April2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('May2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('June2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('July2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('August2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('September2024Invoice.pdf');
INSERT INTO invoices (filename) VALUES ('October2024Invoice.pdf');
