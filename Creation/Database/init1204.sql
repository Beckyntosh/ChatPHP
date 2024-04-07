CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Wines', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Wines', 30.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 60.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 180.00);
INSERT INTO expenses (category, amount) VALUES ('Wines', 45.00);
