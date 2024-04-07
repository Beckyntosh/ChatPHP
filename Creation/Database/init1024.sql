CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Products (productName, price) VALUES ('Apple', 1.99);
INSERT INTO Products (productName, price) VALUES ('Banana', 0.99);
INSERT INTO Products (productName, price) VALUES ('Orange', 2.49);
INSERT INTO Products (productName, price) VALUES ('Milk', 3.49);
INSERT INTO Products (productName, price) VALUES ('Bread', 2.99);
INSERT INTO Products (productName, price) VALUES ('Eggs', 1.79);
INSERT INTO Products (productName, price) VALUES ('Chicken', 5.99);
INSERT INTO Products (productName, price) VALUES ('Spinach', 1.49);
INSERT INTO Products (productName, price) VALUES ('Tomato', 0.99);
INSERT INTO Products (productName, price) VALUES ('Potato', 0.79);
