CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount, description) VALUES ('Food', 50.50, 'Groceries');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 100.25, 'Electricity bill');
INSERT INTO expenses (category, amount, description) VALUES ('Transport', 40.75, 'Gasoline');
INSERT INTO expenses (category, amount, description) VALUES ('Clothing', 80.00, 'New shirt');
INSERT INTO expenses (category, amount, description) VALUES ('Shoes', 120.00, 'Sneakers');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 30.25, 'Restaurant');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 75.60, 'Internet bill');
INSERT INTO expenses (category, amount, description) VALUES ('Transport', 55.40, 'Bus fare');
INSERT INTO expenses (category, amount, description) VALUES ('Clothing', 65.75, 'Jeans');
INSERT INTO expenses (category, amount, description) VALUES ('Shoes', 90.70, 'Sandals');
