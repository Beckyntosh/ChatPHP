CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.50);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.25);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.20);
INSERT INTO expenses (category, amount) VALUES ('Food', 180.60);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 45.90);
INSERT INTO expenses (category, amount) VALUES ('Other', 60.30);
INSERT INTO expenses (category, amount) VALUES ('Food', 210.40);
