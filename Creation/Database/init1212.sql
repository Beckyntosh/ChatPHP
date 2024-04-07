CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  description VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount, description) VALUES ('Food', 200.00, 'Grocery shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Art Supplies', 50.00, 'Paint and brushes');
INSERT INTO expenses (category, amount, description) VALUES ('Bills', 150.00, 'Electricity bill');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 100.00, 'Dining out');
INSERT INTO expenses (category, amount, description) VALUES ('Others', 75.50, 'Miscellaneous items');
INSERT INTO expenses (category, amount, description) VALUES ('Art Supplies', 30.00, 'Sketchbook');
INSERT INTO expenses (category, amount, description) VALUES ('Bills', 200.00, 'Internet bill');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 80.00, 'Weekly groceries');
INSERT INTO expenses (category, amount, description) VALUES ('Others', 25.75, 'Gift purchase');
INSERT INTO expenses (category, amount, description) VALUES ('Art Supplies', 40.50, 'Canvas and paints');
