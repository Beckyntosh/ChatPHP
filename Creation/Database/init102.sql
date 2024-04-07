CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Groceries', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Gas', 30.25);
INSERT INTO expenses (category, amount) VALUES ('Dining Out', 40.50);
INSERT INTO expenses (category, amount) VALUES ('Shopping', 80.75);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 90.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 25.25);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 70.30);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 60.50);
INSERT INTO expenses (category, amount) VALUES ('Education', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 45.75);
