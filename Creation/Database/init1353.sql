CREATE TABLE IF NOT EXISTS custom_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(255) NOT NULL,
    bicycleType VARCHAR(255) NOT NULL,
    customSize VARCHAR(255)
);

INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('John Doe', 'Mountain Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Jane Smith', 'Road Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Alice Johnson', 'Hybrid Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Bob Brown', 'Custom Size', '26 inches frame');
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Sam Wilson', 'Mountain Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Eva Davis', 'Hybrid Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Mark Thompson', 'Road Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Sarah White', 'Custom Size', '24 inches frame');
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Tom Lee', 'Road Bike', NULL);
INSERT INTO custom_orders (customerName, bicycleType, customSize) VALUES ('Olivia Garcia', 'Mountain Bike', NULL);
