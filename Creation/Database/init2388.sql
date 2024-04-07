CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE(username)
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(255)
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO users (username, password) VALUES ('user3', 'password3');
INSERT INTO users (username, password) VALUES ('user4', 'password4');
INSERT INTO users (username, password) VALUES ('user5', 'password5');

INSERT INTO browsing_history (user_id, product_id) VALUES (1, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (1, 2);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 3);
INSERT INTO browsing_history (user_id, product_id) VALUES (3, 2);
INSERT INTO browsing_history (user_id, product_id) VALUES (4, 1);
INSERT INTO browsing_history (user_id, product_id) VALUES (5, 3);

INSERT INTO products (name, description, category) VALUES ('Product A', 'Description A', 'Fitness Equipment');
INSERT INTO products (name, description, category) VALUES ('Product B', 'Description B', 'Fitness Equipment');
INSERT INTO products (name, description, category) VALUES ('Product C', 'Description C', 'Fitness Equipment');
INSERT INTO products (name, description, category) VALUES ('Product D', 'Description D', 'Fitness Equipment');
INSERT INTO products (name, description, category) VALUES ('Product E', 'Description E', 'Fitness Equipment');