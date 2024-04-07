CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO invoices (filename, filepath) VALUES ('invoice1.pdf', 'uploads/invoice1.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice2.pdf', 'uploads/invoice2.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice3.pdf', 'uploads/invoice3.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice4.pdf', 'uploads/invoice4.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice5.pdf', 'uploads/invoice5.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice6.pdf', 'uploads/invoice6.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice7.pdf', 'uploads/invoice7.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice8.pdf', 'uploads/invoice8.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice9.pdf', 'uploads/invoice9.pdf');
INSERT INTO invoices (filename, filepath) VALUES ('invoice10.pdf', 'uploads/invoice10.pdf');
