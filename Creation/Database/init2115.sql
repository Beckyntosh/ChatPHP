CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    product_name VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (wishlist_id) REFERENCES wishlist (id) ON DELETE CASCADE
);

INSERT INTO wishlist (user_id) VALUES (1), (2), (1), (3), (2), (1), (2), (3), (1), (3);

INSERT INTO wishlist_items (wishlist_id, product_name, product_id) VALUES (1, 'Baby Monitor', 101), (2, 'Diaper Bag', 102), (1, 'Bottle Warmer', 103), (3, 'Baby Carrier', 104), (2, 'Baby Stroller', 105), (1, 'Pacifier Set', 106), (2, 'Baby Bibs', 107), (3, 'Baby Clothes Set', 108), (1, 'Baby Bathtub', 109), (3, 'Baby Blanket', 110);
