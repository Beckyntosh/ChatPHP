CREATE TABLE IF NOT EXISTS Wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
user_id INT(6) NOT NULL,
added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
UNIQUE KEY unique_wishlist (product_name, user_id)
);

INSERT INTO Wishlist (product_name, user_id) VALUES ('Knife Set', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Mixing Bowls', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Blender', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Cookware Set', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Utensil Set', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Storage Containers', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Cutting Board', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Food Processor', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Slow Cooker', 1);
INSERT INTO Wishlist (product_name, user_id) VALUES ('Mixer', 1);
