CREATE TABLE IF NOT EXISTS wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    item_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
);

-- Insert values into wishlists and items tables
INSERT INTO wishlists (name) VALUES ('Holiday Wishlist');
INSERT INTO wishlists (name) VALUES ('Birthday Wishlist');
INSERT INTO wishlists (name) VALUES ('Anniversary Wishlist');

INSERT INTO items (wishlist_id, item_name) VALUES (1, 'Wine');
INSERT INTO items (wishlist_id, item_name) VALUES (1, 'Chocolate');
INSERT INTO items (wishlist_id, item_name) VALUES (2, 'Books');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Coffee');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Perfume');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Watch');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Headphones');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Sunglasses');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Scarf');
INSERT INTO items (wishlist_id, item_name) VALUES (3, 'Wallet');
