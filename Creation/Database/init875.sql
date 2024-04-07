CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productname VARCHAR(30) NOT NULL,
price INT(6) NOT NULL
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    quantity INT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES
    ('JohnDoe', 'password1'),
    ('JaneSmith', 'password2'),
    ('AliceJones', 'password3'),
    ('BobBrown', 'password4'),
    ('EllaWhite', 'password5'),
    ('MikeDavis', 'password6'),
    ('SarahWilson', 'password7'),
    ('ChrisMiller', 'password8'),
    ('EmilyClark', 'password9'),
    ('AlexMoore', 'password10');

INSERT INTO products (productname, price) VALUES
    ('Desktop Computer', 899),
    ('Laptop', 1299),
    ('Tablet', 499),
    ('Smartphone', 699),
    ('Smartwatch', 199),
    ('Headphones', 99),
    ('Portable Speaker', 149),
    ('Camera', 599),
    ('Printer', 199),
    ('External Hard Drive', 79);
