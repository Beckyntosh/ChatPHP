CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert values into expenses table
INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Hair Care', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.75);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Hair Care', 30.25);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 45.75);
INSERT INTO expenses (category, amount) VALUES ('Other', 80.20);
INSERT INTO expenses (category, amount) VALUES ('Food', 90.50);