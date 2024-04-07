CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
);

-- Insert values into expenses table
INSERT INTO expenses (category, amount, description) VALUES ('Food', 200.00, 'Grocery shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Furniture', 500.00, 'Authentic furniture purchase');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 75.50, 'Restaurant dinner');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 30.25, 'Fast food lunch');
INSERT INTO expenses (category, amount, description) VALUES ('Furniture', 300.00, 'Antique chair');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 45.75, 'Takeout pizza');
INSERT INTO expenses (category, amount, description) VALUES ('Furniture', 150.00, 'Modern coffee table');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 60.80, 'Grocery store');
INSERT INTO expenses (category, amount, description) VALUES ('Furniture', 200.25, 'Vintage dresser');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 35.50, 'Coffee shop');
