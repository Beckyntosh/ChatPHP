CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data into expenses table
INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Office Supplies', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.50);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 75.25);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 25.00);
INSERT INTO expenses (category, amount) VALUES ('Office Supplies', 30.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 90.75);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 60.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 10.10);
