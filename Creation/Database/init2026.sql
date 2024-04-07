CREATE TABLE IF NOT EXISTS Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(50) NOT NULL,
  productType VARCHAR(50),
  price DECIMAL(10, 2) NOT NULL,
  specifications TEXT,
  reg_date TIMESTAMP
);

INSERT INTO Products (productName, productType, price, specifications) VALUES ("iPhone 13", "Smartphone", 999.99, "64GB RAM, 6.1 Inch Display");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Samsung Galaxy S21", "Smartphone", 799.99, "128GB RAM, 6.2 Inch Display");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("MacBook Pro", "Laptop", 1299.99, "16GB RAM, 13 Inch Display");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Samsung QLED TV", "TV", 1499.99, "55 Inch Display, 4K Resolution");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Apple Watch Series 6", "Smartwatch", 399.99, "Heart Rate Monitor, Waterproof");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Sony Noise Cancelling Headphones", "Headphones", 299.99, "Wireless, Active Noise Cancellation");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Intel Core i7 Processor", "Computer Component", 399.99, "8 Cores, 16 Threads");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Canon EOS Rebel T7i", "Camera", 699.99, "24.2MP APS-C CMOS Sensor, Full HD Video");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("DJI Mavic Air 2", "Drone", 799.99, "4K Video, 34 Minute Flight Time");
INSERT INTO Products (productName, productType, price, specifications) VALUES ("Fitbit Charge 4", "Fitness Tracker", 149.99, "Heart Rate Monitor, Sleep Tracker");

