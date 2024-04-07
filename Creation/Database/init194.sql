CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
productPrice DECIMAL(10, 2) NOT NULL,
productFeatures TEXT,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS comparisons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productIds TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Apple', 1.25, 'Red, juicy, sweet');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Banana', 0.75, 'Yellow, potassium-rich');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Orange', 1.00, 'Citrus, vitamin C');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Milk', 2.50, 'Dairy, calcium-rich');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Bread', 1.75, 'Whole wheat, fiber-rich');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Eggs', 3.00, 'Protein, versatile');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Yogurt', 1.50, 'Probiotic, creamy');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Cheese', 2.75, 'Various types, calcium-rich');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Carrots', 0.50, 'Crunchy, beta carotene');
INSERT INTO products (productName, productPrice, productFeatures) VALUES ('Chicken', 5.00, 'Lean protein, versatile');
