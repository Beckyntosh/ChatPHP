CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DOUBLE(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 50);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 100);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150);
INSERT INTO expenses (category, amount) VALUES ('Education', 80);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 120);
INSERT INTO expenses (category, amount) VALUES ('Personal Care', 40);
INSERT INTO expenses (category, amount) VALUES ('Home Maintenance', 70);
INSERT INTO expenses (category, amount) VALUES ('Gifts', 25);
