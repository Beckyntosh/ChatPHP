CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    item_name VARCHAR(30) NOT NULL,
    item_description VARCHAR(255),
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Lamp', 'Vintage lamp for living room');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Cushion', 'Blue and white striped cushion for sofa');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Rug', 'Large area rug for dining room');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Vase', 'Transparent glass vase for flowers');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Mirror', 'Gold frame mirror for hallway');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Bookshelf', 'Tall wooden bookshelf for study room');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Wall Art', 'Abstract painting for bedroom wall');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Curtains', 'Blackout curtains for bedroom');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Throw Blanket', 'Soft and cozy throw blanket for couch');
INSERT INTO wishlist (user_id, item_name, item_description) VALUES (1, 'Coffee Table', 'Glass top coffee table for living room');