CREATE TABLE IF NOT EXISTS invoices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    invoice_date DATE NOT NULL,
    file_path VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 1', 100.00, '2023-10-15', 'uploads/invoice1.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 2', 150.50, '2023-10-18', 'uploads/invoice2.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 3', 75.25, '2023-10-20', 'uploads/invoice3.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 4', 200.75, '2023-10-22', 'uploads/invoice4.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 5', 50.95, '2023-10-25', 'uploads/invoice5.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 6', 300.00, '2023-10-28', 'uploads/invoice6.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 7', 125.30, '2023-11-01', 'uploads/invoice7.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 8', 80.50, '2023-11-05', 'uploads/invoice8.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 9', 99.99, '2023-11-10', 'uploads/invoice9.pdf');
INSERT INTO invoices (title, amount, invoice_date, file_path) VALUES ('Invoice 10', 175.75, '2023-11-15', 'uploads/invoice10.pdf');