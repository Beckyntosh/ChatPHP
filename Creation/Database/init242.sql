CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
amount DECIMAL(10, 2) NOT NULL,
category VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses(amount, category, description) VALUES (200, 'Food', 'Grocery shopping');
INSERT INTO expenses(amount, category, description) VALUES (50, 'Bath Product', 'Shampoo');
INSERT INTO expenses(amount, category, description) VALUES (100, 'Utilities', 'Electricity bill');
INSERT INTO expenses(amount, category, description) VALUES (20, 'Entertainment', 'Movie ticket');
INSERT INTO expenses(amount, category, description) VALUES (30, 'Other', 'Stationery');
INSERT INTO expenses(amount, category, description) VALUES (150, 'Food', 'Restaurant dinner');
INSERT INTO expenses(amount, category, description) VALUES (80, 'Bath Product', 'Soap');
INSERT INTO expenses(amount, category, description) VALUES (75, 'Other', 'Gym membership');
INSERT INTO expenses(amount, category, description) VALUES (40, 'Utilities', 'Water bill');
INSERT INTO expenses(amount, category, description) VALUES (60, 'Entertainment', 'Concert ticket');