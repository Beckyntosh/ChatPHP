-- Create table users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table browsing_history
CREATE TABLE IF NOT EXISTS browsing_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert data into users table
INSERT INTO users (email, password) VALUES ('user1@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'password10');

-- Insert data into products table
INSERT INTO products (name, description) VALUES ('Product1', 'Description1');
INSERT INTO products (name, description) VALUES ('Product2', 'Description2');
INSERT INTO products (name, description) VALUES ('Product3', 'Description3');
INSERT INTO products (name, description) VALUES ('Product4', 'Description4');
INSERT INTO products (name, description) VALUES ('Product5', 'Description5');
INSERT INTO products (name, description) VALUES ('Product6', 'Description6');
INSERT INTO products (name, description) VALUES ('Product7', 'Description7');
INSERT INTO products (name, description) VALUES ('Product8', 'Description8');
INSERT INTO products (name, description) VALUES ('Product9', 'Description9');
INSERT INTO products (name, description) VALUES ('Product10', 'Description10');
