CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
);

-- Insert data
INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 25.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.00);
