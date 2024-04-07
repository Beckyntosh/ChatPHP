CREATE TABLE expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Hair Care Products', 50.35);
INSERT INTO expenses (category, amount) VALUES ('Food', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Hair Care Products', 30.20);
INSERT INTO expenses (category, amount) VALUES ('Food', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Hair Care Products', 20.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 55.80);
INSERT INTO expenses (category, amount) VALUES ('Hair Care Products', 40.10);
INSERT INTO expenses (category, amount) VALUES ('Food', 90.25);
INSERT INTO expenses (category, amount) VALUES ('Hair Care Products', 15.45);
