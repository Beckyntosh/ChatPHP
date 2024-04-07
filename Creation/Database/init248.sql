CREATE TABLE IF NOT EXISTS Expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO Expenses (category, amount) VALUES ('Food', 50.75);
INSERT INTO Expenses (category, amount) VALUES ('Utilities', 120.50);
INSERT INTO Expenses (category, amount) VALUES ('Clothing', 80.25);
INSERT INTO Expenses (category, amount) VALUES ('Transportation', 35.00);
INSERT INTO Expenses (category, amount) VALUES ('Food', 90.30);
INSERT INTO Expenses (category, amount) VALUES ('Utilities', 75.50);
INSERT INTO Expenses (category, amount) VALUES ('Clothing', 45.70);
INSERT INTO Expenses (category, amount) VALUES ('Transportation', 25.50);
INSERT INTO Expenses (category, amount) VALUES ('Food', 70.80);
