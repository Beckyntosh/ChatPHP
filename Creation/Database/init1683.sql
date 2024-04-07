CREATE TABLE IF NOT EXISTS Skateboards (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_1', 'Brand_1', 50.00);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_2', 'Brand_2', 75.50);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_3', 'Brand_3', 100.00);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_4', 'Brand_1', 45.25);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_5', 'Brand_4', 80.00);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_6', 'Brand_5', 60.75);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_7', 'Brand_2', 55.50);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_8', 'Brand_3', 90.00);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_9', 'Brand_4', 70.25);
INSERT INTO Skateboards (name, brand, price) VALUES ('Skateboard_10', 'Brand_5', 65.00);