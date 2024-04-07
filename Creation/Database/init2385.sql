CREATE TABLE IF NOT EXISTS user_browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    recommended_product_id INT(6) UNSIGNED,
    reason VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user_browsing_history (userid, product_id) VALUES (1, 101);
INSERT INTO user_browsing_history (userid, product_id) VALUES (1, 102);
INSERT INTO user_browsing_history (userid, product_id) VALUES (1, 103);
INSERT INTO user_browsing_history (userid, product_id) VALUES (2, 201);
INSERT INTO user_browsing_history (userid, product_id) VALUES (2, 202);
INSERT INTO user_browsing_history (userid, product_id) VALUES (2, 203);
INSERT INTO user_browsing_history (userid, product_id) VALUES (3, 301);
INSERT INTO user_browsing_history (userid, product_id) VALUES (3, 302);
INSERT INTO user_browsing_history (userid, product_id) VALUES (3, 303);
INSERT INTO user_browsing_history (userid, product_id) VALUES (4, 401);