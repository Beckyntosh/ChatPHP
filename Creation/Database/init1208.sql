CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Education', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Travel', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Gifts', 25.00);
