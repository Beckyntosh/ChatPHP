CREATE TABLE IF NOT EXISTS shopping_cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    product_id INT(6) NOT NULL,
    quantity INT(6) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('1', '101', '5');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('2', '102', '3');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('3', '103', '2');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('4', '104', '7');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('1', '105', '1');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('2', '106', '4');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('3', '107', '3');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('4', '108', '6');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('1', '109', '2');
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('2', '110', '5');