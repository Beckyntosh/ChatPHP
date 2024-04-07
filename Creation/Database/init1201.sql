CREATE TABLE IF NOT EXISTS Expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO Expenses (category, amount) VALUES ('Food', 200);
INSERT INTO Expenses (category, amount) VALUES ('Transportation', 50);
INSERT INTO Expenses (category, amount) VALUES ('Entertainment', 100);
INSERT INTO Expenses (category, amount) VALUES ('Clothing', 75);
INSERT INTO Expenses (category, amount) VALUES ('Medical', 120);
INSERT INTO Expenses (category, amount) VALUES ('Utilities', 80);
INSERT INTO Expenses (category, amount) VALUES ('Gifts', 40);
INSERT INTO Expenses (category, amount) VALUES ('Travel', 300);
INSERT INTO Expenses (category, amount) VALUES ('Education', 150);
INSERT INTO Expenses (category, amount) VALUES ('Personal Care', 60);
