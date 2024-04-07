CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Musical Instruments', 500.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.75);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 75.20);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 120.30);
INSERT INTO expenses (category, amount) VALUES ('Musical Instruments', 1000.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 85.60);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 150.25);