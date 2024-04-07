CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 35.80);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 90.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 55.25);
INSERT INTO expenses (category, amount) VALUES ('Other', 40.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 75.45);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 100.60);
