CREATE TABLE IF NOT EXISTS maternity_wear (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(256) NOT NULL,
product_description TEXT,
product_price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO maternity_wear (product_name, product_description, product_price)
VALUES ('Maternity Dress', 'Elegant and comfortable dress for expecting mothers', 49.99),
('Maternity Leggings', 'Stretchy and stylish leggings for moms-to-be', 29.99),
('Maternity Jeans', 'Fashionable and comfortable jeans for pregnancy', 39.99),
('Maternity Tops', 'Stylish and versatile tops for expectant moms', 34.99),
('Maternity Skirt', 'Chic and trendy skirt for pregnant women', 27.99),
('Maternity Blouse', 'Flowy and flattering blouse for maternity wear', 42.99),
('Maternity Jumpsuit', 'One-piece jumpsuit for a fashionable look during pregnancy', 49.99),
('Maternity Sweater', 'Cozy and warm sweater for expecting mothers', 39.99),
('Maternity Coat', 'Stylish and functional coat for cold weather', 59.99),
('Maternity Pajamas', 'Comfortable and soft pajama set for pregnant women', 34.99);
