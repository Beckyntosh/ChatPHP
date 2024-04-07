CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_viewed VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50),
    description TEXT,
    category VARCHAR(50)
);

INSERT INTO users (username) VALUES ('JohnDoe');
INSERT INTO users (username) VALUES ('JaneSmith');
INSERT INTO users (username) VALUES ('Alice');
INSERT INTO users (username) VALUES ('Bob');
INSERT INTO users (username) VALUES ('Eve');

INSERT INTO browsing_history (user_id, product_viewed) VALUES (1, 'Funny Bike 1');
INSERT INTO browsing_history (user_id, product_viewed) VALUES (1, 'Funny Bike 2');
INSERT INTO browsing_history (user_id, product_viewed) VALUES (2, 'Funny Bike 3');
INSERT INTO browsing_history (user_id, product_viewed) VALUES (3, 'Funny Bike 1');
INSERT INTO browsing_history (user_id, product_viewed) VALUES (4, 'Funny Bike 2');

INSERT INTO products (product_name, description, category) VALUES ('Funny Bike 1', 'A hilarious bicycle with funky colors', 'funny');
INSERT INTO products (product_name, description, category) VALUES ('Funny Bike 2', 'A quirky bicycle with unique design', 'funny');
INSERT INTO products (product_name, description, category) VALUES ('Funny Bike 3', 'A whimsical bicycle for adventurous riders', 'funny');
INSERT INTO products (product_name, description, category) VALUES ('Funny Bike 4', 'An eccentric bicycle for standout personalities', 'funny');
INSERT INTO products (product_name, description, category) VALUES ('Funny Bike 5', 'A comical bike that brings joy to riders', 'funny');
