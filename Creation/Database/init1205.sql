CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50),
    amount DECIMAL(10, 2),
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount, description) VALUES ('Food', 200.00, 'Grocery shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Prescriptions', 50.00, 'Medication refill');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 100.00, 'Electricity bill');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 30.00, 'Restaurant dinner');
INSERT INTO expenses (category, amount, description) VALUES ('Other', 20.00, 'Stationery supplies');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 40.00, 'Fast food lunch');
INSERT INTO expenses (category, amount, description) VALUES ('Prescriptions', 75.00, 'Prescription drugs');
INSERT INTO expenses (category, amount, description) VALUES ('Utilities', 80.00, 'Water bill');
INSERT INTO expenses (category, amount, description) VALUES ('Other', 15.00, 'Magazine purchase');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 50.00, 'Grocery store snacks');