CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
role VARCHAR(20),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
product_description VARCHAR(255),
product_price FLOAT(6,2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, role) VALUES ('Alice', 'password1', 'customer'),
('Bob', 'password2', 'admin'),
('Charlie', 'password3', 'customer'),
('David', 'password4', 'customer'),
('Eve', 'password5', 'admin'),
('Frank', 'password6', 'customer'),
('Grace', 'password7', 'customer'),
('Henry', 'password8', 'admin'),
('Isabel', 'password9', 'customer'),
('Jack', 'password10', 'customer');

INSERT INTO products (product_name, product_description, product_price) VALUES 
('Maternity Dress', 'Comfortable and stylish dress for expecting mothers', 29.99),
('Baby Romper', 'Adorable romper for newborns', 15.99),
('Nursing Pillow', 'Supportive pillow for breastfeeding', 19.99),
('Pregnancy Journal', 'Keepsake journal to document memories', 9.99),
('Baby Carrier', 'Convenient carrier for on-the-go parents', 39.99),
('Maternity Leggings', 'Stretchy and versatile leggings for moms-to-be', 24.99),
('Baby Blanket', 'Soft and cozy blanket for naptime', 12.99),
('Diaper Bag', 'Functional and stylish bag for baby essentials', 34.99),
('Mommy Robe', 'Luxurious robe for postpartum relaxation', 27.99),
('Baby Socks Set', 'Cute and comfy socks for tiny toes', 7.99);
