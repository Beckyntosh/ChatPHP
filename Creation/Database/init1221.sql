CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Electronics', 500.50);
INSERT INTO expenses (category, amount) VALUES ('Housing', 1000.75);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 75.30);
INSERT INTO expenses (category, amount) VALUES ('Food', 120.50);
INSERT INTO expenses (category, amount) VALUES ('Electronics', 300.80);
INSERT INTO expenses (category, amount) VALUES ('Housing', 750.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30.00);