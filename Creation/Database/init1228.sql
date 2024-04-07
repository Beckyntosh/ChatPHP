-- Create table if not exists
CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert at least 10 values into the expenses table
INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Medical', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Housing', 500.00);
INSERT INTO expenses (category, amount) VALUES ('Personal Care', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Education', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Travel', 250.00);