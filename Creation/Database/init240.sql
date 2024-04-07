CREATE TABLE IF NOT EXISTS expenses (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30.50);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 100.25);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 20.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 40.20);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 80.50);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 95.75);
