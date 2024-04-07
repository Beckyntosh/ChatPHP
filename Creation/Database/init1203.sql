CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    amount FLOAT(10,2) NOT NULL,
    category VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (amount, category, description) VALUES (200, 'Food', 'Grocery shopping');
INSERT INTO expenses (amount, category, description) VALUES (50, 'Utilities', 'Electricity bill');
INSERT INTO expenses (amount, category, description) VALUES (30, 'Entertainment', 'Movie night');
INSERT INTO expenses (amount, category, description) VALUES (100, 'Board Games', 'New board game purchase');
INSERT INTO expenses (amount, category, description) VALUES (80, 'Food', 'Restaurant dinner');
INSERT INTO expenses (amount, category, description) VALUES (20, 'Utilities', 'Water bill');
INSERT INTO expenses (amount, category, description) VALUES (15, 'Entertainment', 'Concert tickets');
INSERT INTO expenses (amount, category, description) VALUES (50, 'Board Games', 'Expansion pack');
INSERT INTO expenses (amount, category, description) VALUES (25, 'Food', 'Snack purchases');
INSERT INTO expenses (amount, category, description) VALUES (70, 'Entertainment', 'Amusement park ticket');
