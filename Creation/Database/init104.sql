CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    description VARCHAR(255),
    expense_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Equipment', 50.00, 'Bought new gloves', '2022-01-15');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Travel', 100.00, 'Train tickets', '2022-01-20');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Membership', 25.00, 'Gym subscription', '2022-02-01');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Clothing', 75.00, 'New shoes', '2022-02-10');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Miscellaneous', 20.00, 'Stationery items', '2022-02-15');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Equipment', 30.00, 'New cycling helmet', '2022-02-20');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Travel', 50.00, 'Bus fares', '2022-03-05');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Clothing', 60.00, 'Winter jacket', '2022-03-10');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Membership', 35.00, 'Online course subscription', '2022-03-15');
INSERT INTO expenses (category, amount, description, expense_date) VALUES ('Miscellaneous', 10.00, 'Gift for friend', '2022-03-20');
