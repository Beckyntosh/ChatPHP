CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.50);
INSERT INTO expenses (category, amount) VALUES ('Personal', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Other', 75.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Personal', 25.75);
INSERT INTO expenses (category, amount) VALUES ('Other', 100.25);
INSERT INTO expenses (category, amount) VALUES ('Food', 180.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.75);
