CREATE TABLE IF NOT EXISTS shopping_cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    cart_items TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD1", "DVD2"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD3", "DVD4"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD5", "DVD6"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD7", "DVD8"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD9", "DVD10"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD11", "DVD12"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD13", "DVD14"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD15", "DVD16"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD17", "DVD18"]');
INSERT INTO shopping_cart (user_id, cart_items) VALUES (1, '["DVD19", "DVD20"]');
