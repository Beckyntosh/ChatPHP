CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 50);
INSERT INTO expenses (category, amount) VALUES ('Food', 150);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 100);
INSERT INTO expenses (category, amount) VALUES ('Food', 75);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 30);
INSERT INTO expenses (category, amount) VALUES ('Food', 120);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 80);
INSERT INTO expenses (category, amount) VALUES ('Food', 90);
INSERT INTO expenses (category, amount) VALUES ('Gardening Tools', 70);
