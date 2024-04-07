CREATE TABLE invoices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO invoices (filename) VALUES ('invoice1.pdf');
INSERT INTO invoices (filename) VALUES ('invoice2.pdf');
INSERT INTO invoices (filename) VALUES ('invoice3.pdf');
INSERT INTO invoices (filename) VALUES ('invoice4.pdf');
INSERT INTO invoices (filename) VALUES ('invoice5.pdf');
INSERT INTO invoices (filename) VALUES ('invoice6.pdf');
INSERT INTO invoices (filename) VALUES ('invoice7.pdf');
INSERT INTO invoices (filename) VALUES ('invoice8.pdf');
INSERT INTO invoices (filename) VALUES ('invoice9.pdf');
INSERT INTO invoices (filename) VALUES ('invoice10.pdf');