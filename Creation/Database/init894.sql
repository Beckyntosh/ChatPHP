CREATE TABLE IF NOT EXISTS ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john.doe@example.com', 'password123');

INSERT INTO users (username, name, email, password) VALUES ('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'securepwd');

INSERT INTO recipes (user_id, title, description, ingredients, steps, image) VALUES (1, 'Pasta Carbonara', 'Classic pasta dish with eggs and pancetta', 'Spaghetti, eggs, pancetta', '1. Cook spaghetti. 2. Cook pancetta. 3. Mix eggs. 4. Combine', 'pasta_carbonara.jpg');

INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (1, 2, 4, 'Really enjoyed this dish!');

INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (1, 1, 5, 'Best pasta I have ever had!');

INSERT INTO users (username, name, email, password) VALUES ('brian_smith', 'Brian Smith', 'brian.smith@example.com', 'pass123');

INSERT INTO users (username, name, email, password) VALUES ('sarah_jones', 'Sarah Jones', 'sarah.jones@example.com', 'password456');

INSERT INTO recipes (user_id, title, description, ingredients, steps, image) VALUES (3, 'Chocolate Cake', 'Decadent chocolate cake', 'Flour, cocoa powder, sugar, eggs', '1. Mix dry ingredients. 2. Beat eggs. 3. Bake', 'chocolate_cake.jpg');

INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (2, 3, 5, 'Absolutely delicious!');

INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (2, 4, 3, 'Could be sweeter.');

INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (2, 1, 4, 'Good cake, but a bit dense.');

CREATE DATABASE IF NOT EXISTS my_database;
