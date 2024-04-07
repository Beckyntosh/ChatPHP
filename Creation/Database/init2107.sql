CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    item_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Chair');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Desk');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Bookshelf');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Bed frame');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Sofa');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Dining table');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Cabinet');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Coffee table');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Dresser');
INSERT INTO wishlist (user_id, item_name) VALUES (1, 'Nightstand');