-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50),
    details TEXT
);

-- Create browsing_history table
CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    view_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insert 10 values into users table
INSERT INTO users (username) VALUES ('JohnDoe');
INSERT INTO users (username) VALUES ('JaneSmith');
INSERT INTO users (username) VALUES ('AliceJohnson');
INSERT INTO users (username) VALUES ('BobBrown');
INSERT INTO users (username) VALUES ('EmilyDavis');
INSERT INTO users (username) VALUES ('SamWilson');
INSERT INTO users (username) VALUES ('OliviaMartinez');
INSERT INTO users (username) VALUES ('DavidLee');
INSERT INTO users (username) VALUES ('SophiaClark');
INSERT INTO users (username) VALUES ('MatthewYoung');

-- Insert 10 values into products table
INSERT INTO products (name, category, details) VALUES ('Shower Gel', 'Body', 'Refreshing and moisturizing');
INSERT INTO products (name, category, details) VALUES ('Bath Bomb', 'Body', 'Aromatherapy and relaxation');
INSERT INTO products (name, category, details) VALUES ('Bubble Bath', 'Body', 'Foamy and fun for kids');
INSERT INTO products (name, category, details) VALUES ('Shampoo', 'Hair', 'Nourishing and sulfate-free');
INSERT INTO products (name, category, details) VALUES ('Conditioner', 'Hair', 'Smoothing and detangling');
INSERT INTO products (name, category, details) VALUES ('Body Scrub', 'Body', 'Exfoliating and skin-smoothing');
INSERT INTO products (name, category, details) VALUES ('Hand Soap', 'Hands', 'Gentle and moisturizing');
INSERT INTO products (name, category, details) VALUES ('Lotion', 'Body', 'Hydrating and fast-absorbing');
INSERT INTO products (name, category, details) VALUES ('Facial Cleanser', 'Face', 'Gentle and oil-balancing');
INSERT INTO products (name, category, details) VALUES ('Face Mask', 'Face', 'Purifying and revitalizing');