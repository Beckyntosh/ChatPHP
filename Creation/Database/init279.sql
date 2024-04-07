CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 100.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.30);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 120.30);
INSERT INTO expenses (category, amount) VALUES ('Education', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Home', 300.50);
INSERT INTO expenses (category, amount) VALUES ('Travel', 250.75);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 50.20);
