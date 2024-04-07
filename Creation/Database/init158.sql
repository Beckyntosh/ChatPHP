CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30.00);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Education', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Travel', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Technology', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Home Improvement', 250.00);
