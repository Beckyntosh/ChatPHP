CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO items (name, price) VALUES ('Spade', 10.99);
INSERT INTO items (name, price) VALUES ('Rake', 8.75);
INSERT INTO items (name, price) VALUES ('Shovel', 12.50);
INSERT INTO items (name, price) VALUES ('Gloves', 5.99);
INSERT INTO items (name, price) VALUES ('Pruner', 15.25);
INSERT INTO items (name, price) VALUES ('Hoe', 11.50);
INSERT INTO items (name, price) VALUES ('Watering Can', 7.99);
INSERT INTO items (name, price) VALUES ('Weeder', 6.75);
INSERT INTO items (name, price) VALUES ('Trowel', 9.99);
INSERT INTO items (name, price) VALUES ('Wheelbarrow', 39.99);