-- init.sql

-- Create expenses table
CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    description TEXT,
    entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample expenses
INSERT INTO expenses (category, amount, description) VALUES ('Food', 200, 'Grocery shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Wines', 50.55, 'Red wine');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 100, 'Electricity bill');
INSERT INTO expenses (category, amount, description) VALUES ('Entertainment', 75.99, 'Movie ticket');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 35.75, 'Restaurant dinner');
INSERT INTO expenses (category, amount, description) VALUES ('Wines', 20.20, 'White wine');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 50, 'Internet bill');
INSERT INTO expenses (category, amount, description) VALUES ('Entertainment', 45.30, 'Concert ticket');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 40, 'Takeout lunch');
INSERT INTO expenses (category, amount, description) VALUES ('Wines', 70.15, 'Sparkling wine');
