CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_viewed VARCHAR(50),
    view_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS product_recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_recommended VARCHAR(50),
    rec_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username) VALUES ('Alice');
INSERT INTO users (username) VALUES ('Bob');
INSERT INTO users (username) VALUES ('Charlie');
INSERT INTO users (username) VALUES ('David');
INSERT INTO users (username) VALUES ('Eve');
INSERT INTO users (username) VALUES ('Frank');
INSERT INTO users (username) VALUES ('Grace');
INSERT INTO users (username) VALUES ('Holly');
INSERT INTO users (username) VALUES ('Ivy');
INSERT INTO users (username) VALUES ('Jack');

INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (1, 'Lipstick', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (1, 'Eyeliner', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (2, 'Foundation', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (3, 'Mascara', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (4, 'Blush', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (5, 'Eyeshadow', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (6, 'Bronzer', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (7, 'Highlighter', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (8, 'Concealer', NOW());
INSERT INTO browsing_history (user_id, product_viewed, view_date) VALUES (9, 'Setting Powder', NOW());

INSERT INTO product_recommendations (user_id, product_recommended, rec_date) VALUES (1, 'Highlighter', NOW());
INSERT INTO product_recommendations (user_id, product_recommended, rec_date) VALUES (2, 'Bronzer', NOW());
INSERT INTO product_recommendations (user_id, product_recommended, rec_date) VALUES (3, 'Lipstick', NOW());
INSERT INTO product_recommendations (user_id, product_recommended, rec_date) VALUES (4, 'Eyeshadow', NOW());
INSERT INTO product_recommendations (user_id, product_recommended, rec_date) VALUES (5, 'Concealer', NOW());
