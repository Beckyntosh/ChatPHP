CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Wishlist Items Table
CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT(6) UNSIGNED,
    item_name VARCHAR(255) NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
);

-- Insert values into wishlists table
INSERT INTO wishlists (user_id, name) VALUES (1, 'Summer Wishlist');
INSERT INTO wishlists (user_id, name) VALUES (2, 'Workout Wishlist');
INSERT INTO wishlists (user_id, name) VALUES (3, 'Vacation Wishlist');

-- Insert values into wishlist_items table
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (1, 'Sunglasses', 50.00);
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (1, 'Swimsuit', 30.00);
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (2, 'Running Shoes', 80.00);
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (2, 'Yoga Mat', 20.00);
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (3, 'Passport Holder', 15.00);
INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (3, 'Travel Adapter', 10.00);
