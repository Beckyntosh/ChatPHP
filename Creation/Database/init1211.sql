CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', '200.00');
INSERT INTO expenses (category, amount) VALUES ('Shopping', '150.25');
INSERT INTO expenses (category, amount) VALUES ('Entertainment', '50.75');
INSERT INTO expenses (category, amount) VALUES ('Transportation', '75.50');
INSERT INTO expenses (category, amount) VALUES ('Utilities', '100.00');
INSERT INTO expenses (category, amount) VALUES ('Health', '80.30');
INSERT INTO expenses (category, amount) VALUES ('Rent', '800.00');
INSERT INTO expenses (category, amount) VALUES ('Insurance', '120.50');
INSERT INTO expenses (category, amount) VALUES ('Education', '300.00');
INSERT INTO expenses (category, amount) VALUES ('Personal Care', '45.75');
