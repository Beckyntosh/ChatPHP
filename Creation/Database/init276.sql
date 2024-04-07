CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    category VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO expenses (amount, category) VALUES (200.00, 'Food');
INSERT INTO expenses (amount, category) VALUES (50.00, 'Utilities');
INSERT INTO expenses (amount, category) VALUES (30.00, 'Transportation');
INSERT INTO expenses (amount, category) VALUES (100.00, 'Entertainment');
INSERT INTO expenses (amount, category) VALUES (75.00, 'Food');
INSERT INTO expenses (amount, category) VALUES (20.00, 'Utilities');
INSERT INTO expenses (amount, category) VALUES (15.00, 'Transportation');
INSERT INTO expenses (amount, category) VALUES (50.00, 'Entertainment');
INSERT INTO expenses (amount, category) VALUES (120.00, 'Food');
INSERT INTO expenses (amount, category) VALUES (40.00, 'Utilities');
