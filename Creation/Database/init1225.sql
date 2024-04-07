CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.50);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.25);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Education', 120.50);
INSERT INTO expenses (category, amount) VALUES ('Personal Care', 40.75);
INSERT INTO expenses (category, amount) VALUES ('Home', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 55.25);
