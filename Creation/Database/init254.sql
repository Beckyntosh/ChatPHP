CREATE TABLE kitchenware_products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255) NOT NULL,
    Price DECIMAL(10,2) NOT NULL
);

INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Knife', 9.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Frying Pan', 19.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Spatula', 4.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Mixing Bowl', 12.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Cutting Board', 7.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Whisk', 3.49);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Peeler', 5.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Measuring Cups', 6.99);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Can Opener', 8.49);
INSERT INTO kitchenware_products (ProductName, Price) VALUES ('Tongs', 7.49);