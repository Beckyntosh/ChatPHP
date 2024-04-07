CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Shopping', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Education', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Travel', 250.00);
INSERT INTO expenses (category, amount) VALUES ('Gifts', 70.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 90.00);
