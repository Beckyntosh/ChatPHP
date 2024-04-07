CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2)
);

INSERT INTO products (name, description, price) VALUES ('Desktop Computer 1', 'High-performance desktop computer with Intel i7 processor', 999.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 2', 'Gaming desktop computer with NVIDIA RTX graphics card', 1499.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 3', 'Budget-friendly desktop computer with AMD Ryzen processor', 699.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 4', 'All-in-one desktop computer with touch screen display', 1299.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 5', 'Compact desktop computer for home office use', 499.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 6', 'Professional workstation desktop computer for graphic design', 1799.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 7', 'Customizable desktop computer for gaming enthusiasts', 1099.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 8', 'Slim desktop computer with SSD storage', 799.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 9', 'Mini desktop computer for space-saving setup', 599.99);
INSERT INTO products (name, description, price) VALUES ('Desktop Computer 10', 'Powerful desktop computer for video editing tasks', 1299.99);
