CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist (item_name) VALUES ('Organic Apples');
INSERT INTO wishlist (item_name) VALUES ('Organic Spinach');
INSERT INTO wishlist (item_name) VALUES ('Organic Quinoa');
INSERT INTO wishlist (item_name) VALUES ('Organic Blueberries');
INSERT INTO wishlist (item_name) VALUES ('Organic Avocado');
INSERT INTO wishlist (item_name) VALUES ('Organic Kale');
INSERT INTO wishlist (item_name) VALUES ('Organic Almonds');
INSERT INTO wishlist (item_name) VALUES ('Organic Chia Seeds');
INSERT INTO wishlist (item_name) VALUES ('Organic Coconut Oil');
INSERT INTO wishlist (item_name) VALUES ('Organic Sweet Potatoes');
