CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3');

CREATE TABLE IF NOT EXISTS gift_cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50),
    value DECIMAL(10, 2),
    is_redeemed BOOLEAN DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS redeemed_gift_cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    gift_card_id INT,
    redeemed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (gift_card_id) REFERENCES gift_cards(id)
);

INSERT INTO gift_cards (code, value, is_redeemed) VALUES
    ('GC123', 50.00, 0),
    ('GC456', 75.00, 0),
    ('GC789', 100.00, 0),
    ('GC101', 25.00, 0),
    ('GC202', 150.00, 0),
    ('GC303', 200.00, 0),
    ('GC404', 50.00, 0),
    ('GC505', 75.00, 0),
    ('GC606', 100.00, 0),
    ('GC707', 25.00, 0);
