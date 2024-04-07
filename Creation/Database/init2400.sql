CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    visited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    category VARCHAR(50)
);

INSERT INTO products (name, category) VALUES ('Colorful Pencils', 'Drawing');
INSERT INTO products (name, category) VALUES ('Lively Notebooks', 'Writing');
INSERT INTO products (name, category) VALUES ('Erasable Pens', 'Writing');
INSERT INTO products (name, category) VALUES ('Geometry Set', 'Mathematics');
INSERT INTO products (name, category) VALUES ('Backpack with Cartoon Prints', 'Accessories');
INSERT INTO products (name, category) VALUES ('Watercolor Paint Set', 'Art');
INSERT INTO products (name, category) VALUES ('Astronomy Telescope', 'Science');
INSERT INTO products (name, category) VALUES ('Keyboard & Mouse Combo', 'Computer Accessories');
INSERT INTO products (name, category) VALUES ('Fitness Tracker Smartwatch', 'Health & Fitness');
INSERT INTO products (name, category) VALUES ('Portable Bluetooth Speaker', 'Electronics');
