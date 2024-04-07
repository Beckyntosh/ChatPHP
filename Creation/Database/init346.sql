CREATE TABLE IF NOT EXISTS wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    item_description VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
);

-- Insert values into tables
INSERT INTO wishlists (user_id, name, description) VALUES (1, 'Women\'s Handbags', 'Collection of stylish handbags');
INSERT INTO wishlists (user_id, name, description) VALUES (2, 'Men\'s Bags', 'Assorted bags for men');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (1, 'Leather Tote Bag', 'Classic brown leather tote', 'https://example.com/totebag');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (1, 'Crossbody Sling Bag', 'Compact and versatile bag', 'https://example.com/slingbag');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (2, 'Backpack with Laptop Sleeve', 'Ideal for work and travel', 'https://example.com/backpack');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (2, 'Canvas Messenger Bag', 'Casual and stylish option', 'https://example.com/messengerbag');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (1, 'Clutch Purse', 'Elegant evening accessory', 'https://example.com/clutch');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (1, 'Hobo Shoulder Bag', 'Relaxed bohemian style', 'https://example.com/hobobag');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (2, 'Duffel Bag', 'Spacious for gym or travel', 'https://example.com/duffelbag');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (2, 'Waist Pack', 'Hands-free storage solution', 'https://example.com/waistpack');
INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (1, 'Satchel Bag', 'Professional and chic option', 'https://example.com/satchel');
