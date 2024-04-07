CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2),
    category VARCHAR(255)
);
INSERT INTO expenses (amount, category) VALUES (200, 'Food');
INSERT INTO expenses (amount, category) VALUES (50, 'Clothing');
INSERT INTO expenses (amount, category) VALUES (100, 'Utilities');
INSERT INTO expenses (amount, category) VALUES (300, 'Jewelry');
INSERT INTO expenses (amount, category) VALUES (75, 'Food');
INSERT INTO expenses (amount, category) VALUES (20, 'Clothing');
INSERT INTO expenses (amount, category) VALUES (150, 'Utilities');
INSERT INTO expenses (amount, category) VALUES (250, 'Jewelry');
INSERT INTO expenses (amount, category) VALUES (30, 'Food');
INSERT INTO expenses (amount, category) VALUES (80, 'Others');
