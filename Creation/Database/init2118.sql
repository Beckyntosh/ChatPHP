CREATE TABLE IF NOT EXISTS Wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

-- Create WishlistItems table
CREATE TABLE IF NOT EXISTS WishlistItems (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT(6) UNSIGNED,
    item_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES Wishlists(id)
);

-- Insert sample data into the tables
INSERT INTO Wishlists (name) VALUES ('My Wishlist 1'), ('My Wishlist 2'), ('My Wishlist 3');
INSERT INTO WishlistItems (wishlist_id, item_name) VALUES (1, 'Pillow'), (1, 'Blanket'), (1, 'Sheets'), (2, 'Comforter'), (2, 'Throw Pillow'), (3, 'Duvet Cover'), (3, 'Bed Skirt'), (3, 'Bedspread'), (3, 'Quilt'), (3, 'Mattress Topper');
