CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(50) NOT NULL,
productType VARCHAR(50),
description TEXT,
price DECIMAL(10,2)
);

INSERT INTO products (productName, productType, description, price) 
VALUES ('Organic Apples', 'Fruits', 'Fresh organic apples from local farm', 2.99),
('Organic Spinach', 'Vegetables', 'Organic spinach leaves rich in nutrients', 3.49),
('Organic Milk', 'Dairy', 'Organic cow milk with no added hormones', 4.99),
('Organic Eggs', 'Dairy', 'Free-range organic eggs from happy hens', 3.29),
('Organic Quinoa', 'Grains', 'Organic quinoa grains for a healthy diet', 5.99),
('Organic Chicken', 'Meat', 'Organic free-range chicken breast', 8.99),
('Organic Tomatoes', 'Vegetables', 'Juicy organic tomatoes for salads', 2.49),
('Organic Avocado', 'Fruits', 'Creamy organic avocado rich in healthy fats', 1.99),
('Organic Yogurt', 'Dairy', 'Organic probiotic yogurt for gut health', 2.79),
('Organic Honey', 'Pantry', 'Pure organic honey from local beekeeper', 6.49);
