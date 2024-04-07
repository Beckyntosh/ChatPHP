CREATE TABLE expenses (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   category VARCHAR(50) NOT NULL,
   amount DECIMAL(10,2) NOT NULL
);

INSERT INTO expenses (category, amount) VALUES ('food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('art_supplies', 50.00);
INSERT INTO expenses (category, amount) VALUES ('utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('art_supplies', 30.00);
INSERT INTO expenses (category, amount) VALUES ('utilities', 80.00);
INSERT INTO expenses (category, amount) VALUES ('food', 100.00);
INSERT INTO expenses (category, amount) VALUES ('other', 70.00);
INSERT INTO expenses (category, amount) VALUES ('food', 120.00);
INSERT INTO expenses (category, amount) VALUES ('art_supplies', 40.00);
