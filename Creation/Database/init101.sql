CREATE TABLE IF NOT EXISTS Expenses (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                category VARCHAR(30) NOT NULL,
                amount DECIMAL(10,2) NOT NULL,
                description TEXT,
                expense_date DATE NOT NULL,
                reg_date TIMESTAMP
            );

INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Groceries', 50.00, 'Weekly grocery shopping', '2022-01-05');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Transportation', 30.50, 'Gas for car', '2022-01-10');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Utilities', 100.00, 'Electricity bill', '2022-01-15');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Entertainment', 20.00, 'Movie night', '2022-01-20');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Dining Out', 40.75, 'Dinner with friends', '2022-01-25');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Clothing', 75.50, 'New shoes', '2022-02-01');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Healthcare', 80.00, 'Doctor visit', '2022-02-05');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Insurance', 150.00, 'Car insurance payment', '2022-02-10');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Education', 200.25, 'Textbooks for classes', '2022-02-15');
INSERT INTO Expenses (category, amount, description, expense_date) VALUES ('Gifts', 50.00, 'Birthday present for friend', '2022-02-20');
