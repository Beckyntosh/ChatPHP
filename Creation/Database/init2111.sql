CREATE TABLE IF NOT EXISTS wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
item_name VARCHAR(50) NOT NULL,
item_link VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Macbook Pro', 'https://www.example.com/macbookpro');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Dell XPS 13', 'https://www.example.com/dellxps13');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'HP Spectre x360', 'https://www.example.com/hpspectre');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Lenovo ThinkPad X1 Carbon', 'https://www.example.com/thinkpad');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Asus ZenBook', 'https://www.example.com/asuszenbook');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Microsoft Surface Laptop', 'https://www.example.com/surfacelaptop');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Acer Swift 3', 'https://www.example.com/acerswift');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Google Pixelbook', 'https://www.example.com/pixelbook');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Razer Blade', 'https://www.example.com/razerblade');
INSERT INTO wishlist (user_id, item_name, item_link) VALUES (1, 'Samsung Galaxy Book', 'https://www.example.com/galaxybook');