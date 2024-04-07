CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
CREATE TABLE IF NOT EXISTS hotel_search (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    search_query VARCHAR(255),
    search_results TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS presentations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    file_path TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 1', 'Description 1', 'Category 1', 10.50, 100);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 2', 'Description 2', 'Category 2', 20.75, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 3', 'Description 3', 'Category 1', 15.25, 75);
INSERT INTO users (username, name, email, password) VALUES ('user1', 'User One', 'user1@example.com', 'password1');
INSERT INTO users (username, name, email, password) VALUES ('user2', 'User Two', 'user2@example.com', 'password2');
INSERT INTO users (username, name, email, password) VALUES ('user3', 'User Three', 'user3@example.com', 'password3');
INSERT INTO favorites (user_id, product_id) VALUES (1, 1);
INSERT INTO favorites (user_id, product_id) VALUES (1, 2);
INSERT INTO favorites (user_id, product_id) VALUES (2, 2);
INSERT INTO hotel_search (user_id, search_query, search_results) VALUES (1, 'search query 1', 'search results 1');
INSERT INTO hotel_search (user_id, search_query, search_results) VALUES (2, 'search query 2', 'search results 2');
