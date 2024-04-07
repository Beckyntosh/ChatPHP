CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30);
INSERT INTO expenses (category, amount) VALUES ('Clothing', 100);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 80);
INSERT INTO expenses (category, amount) VALUES ('Education', 120);
INSERT INTO expenses (category, amount) VALUES ('Travel', 250);
INSERT INTO expenses (category, amount) VALUES ('Personal Care', 70);
INSERT INTO expenses (category, amount) VALUES ('Home Supplies', 40);