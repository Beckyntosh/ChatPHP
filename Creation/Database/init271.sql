CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.75);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 20.35);
INSERT INTO expenses (category, amount) VALUES ('Food', 75.20);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 89.99);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 45.75);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 30.50);
