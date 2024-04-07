CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
brandName VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL
);

INSERT INTO Products (productName, brandName, description, price) VALUES ('Shampoo', 'Dove', 'Moisturizing shampoo for all hair types', 8.99);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Body Wash', 'Cetaphil', 'Gentle skin cleanser for sensitive skin', 10.50);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Bath Bombs', 'Lush', 'Fizzy bath balls with essential oils', 5.75);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Bubble Bath', 'Johnson & Johnson', 'Classic bubble bath for kids', 3.99);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Body Scrub', 'The Body Shop', 'Exfoliating scrub for smoother skin', 12.75);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Shower Gel', 'Nivea', 'Refreshing shower gel with aloe vera', 6.50);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Bath Salts', 'Dr Teals', 'Epsom salt soak for relaxation', 7.25);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Bar Soap', 'Dial', 'Deodorizing soap for a fresh clean feeling', 2.99);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Hand Soap', 'Method', 'Eco-friendly foaming hand soap', 4.50);
INSERT INTO Products (productName, brandName, description, price) VALUES ('Body Lotion', 'Aveeno', 'Soothing oatmeal lotion for dry skin', 9.75);