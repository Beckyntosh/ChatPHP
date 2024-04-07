CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    view_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'secret123');
INSERT INTO users (username, password) VALUES ('test_user', 'testpass');

INSERT INTO browsing_history (user_id, product_id) VALUES (1, 101);
INSERT INTO browsing_history (user_id, product_id) VALUES (1, 102);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 101);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 103);
INSERT INTO browsing_history (user_id, product_id) VALUES (3, 102);
INSERT INTO browsing_history (user_id, product_id) VALUES (3, 104);
INSERT INTO browsing_history (user_id, product_id) VALUES (1, 101);
INSERT INTO browsing_history (user_id, product_id) VALUES (2, 102);
INSERT INTO browsing_history (user_id, product_id) VALUES (3, 103);
