CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price, reg_date) VALUES ('iPhone 13', 'Latest iPhone model', 'Smartphone', '799.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Samsung Galaxy S21', 'Latest Samsung model', 'Smartphone', '699.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('PlayStation 5', 'Next-gen gaming console', 'Gaming', '499.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Xbox Series X', 'Microsoft gaming console', 'Gaming', '499.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('LED Smart TV', '55" Ultra HD TV', 'Electronics', '899.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Apple AirPods Pro', 'Wireless earbuds', 'Audio', '249.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('GoPro Hero 10', 'Action camera', 'Cameras', '399.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Kindle Paperwhite', 'E-reader with built-in light', 'Books', '129.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('DJI Mavic Air 2', 'Foldable drone', 'Drones', '799.99', CURRENT_TIMESTAMP);
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Fitbit Charge 5', 'Activity tracker with GPS', 'Wearables', '179.99', CURRENT_TIMESTAMP);
