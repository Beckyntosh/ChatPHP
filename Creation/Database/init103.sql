CREATE TABLE IF NOT EXISTS Expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date DATE NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Expenses (category, amount, expense_date) VALUES ('Furniture', 100.00, '2022-01-15');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Decor', 50.25, '2022-02-20');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Improvements', 300.75, '2022-03-10');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Maintenance', 75.60, '2022-04-05');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Furniture', 85.00, '2022-05-12');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Decor', 120.50, '2022-06-18');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Improvements', 250.25, '2022-07-25');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Maintenance', 95.00, '2022-08-09');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Furniture', 110.75, '2022-09-14');
INSERT INTO Expenses (category, amount, expense_date) VALUES ('Decor', 70.20, '2022-10-30');