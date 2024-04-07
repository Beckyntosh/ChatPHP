CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    user_id INT,
    INDEX(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    wine_name VARCHAR(255) NOT NULL,
    INDEX(wishlist_id),
    FOREIGN KEY (wishlist_id) REFERENCES wishlist(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO wishlist (title, description, user_id) VALUES
('Birthday Wishlist', 'Items for my upcoming birthday', 1),
('Christmas Wishlist', 'Gift ideas for the holiday season', 2),
('Graduation Wishlist', 'Things I need after graduation', 3);

INSERT INTO wishlist_items (wishlist_id, wine_name) VALUES
(1, 'Merlot'),
(1, 'Chardonnay'),
(1, 'Sauvignon Blanc'),
(2, 'Pinot Noir'),
(2, 'Cabernet Sauvignon'),
(3, 'Riesling'),
(3, 'Malbec'),
(3, 'Syrah'),
(3, 'Zinfandel'),
(3, 'Rosé');
