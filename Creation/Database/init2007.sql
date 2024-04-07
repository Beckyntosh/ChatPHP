CREATE TABLE IF NOT EXISTS Wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) NOT NULL,
item_name VARCHAR(255) NOT NULL,
item_description TEXT,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (1, "Diamond Ring", "Beautiful diamond ring for special occasions");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (1, "Gold Bracelet", "Elegant gold bracelet to accessorize any outfit");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (2, "Sapphire Earrings", "Stunning sapphire earrings for a touch of color");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (2, "Silver Necklace", "Classic silver necklace that goes with everything");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (3, "Pearl Brooch", "Vintage pearl brooch perfect for vintage lovers");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (3, "Ruby Pendant", "Exquisite ruby pendant for a bold statement look");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (4, "Emerald Ring", "Luxurious emerald ring for a touch of sophistication");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (4, "Platinum Watch", "Sleek platinum watch for a modern touch");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (5, "Amethyst Bracelet", "Unique amethyst bracelet for a pop of color");
INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (5, "Rose Gold Earrings", "Chic rose gold earrings for a trendy look");
