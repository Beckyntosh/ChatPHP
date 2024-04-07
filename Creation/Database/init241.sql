CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Vinyl Records', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.25);
INSERT INTO expenses (category, amount) VALUES ('Vinyl Records', 30.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 50.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 180.00);
INSERT INTO expenses (category, amount) VALUES ('Vinyl Records', 25.75);
