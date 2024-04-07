CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist (itemName) VALUES ('Organic Apples');
INSERT INTO wishlist (itemName) VALUES ('Organic Spinach');
INSERT INTO wishlist (itemName) VALUES ('Organic Quinoa');
INSERT INTO wishlist (itemName) VALUES ('Organic Avocado');
INSERT INTO wishlist (itemName) VALUES ('Organic Almond Milk');
INSERT INTO wishlist (itemName) VALUES ('Organic Kale');
INSERT INTO wishlist (itemName) VALUES ('Organic Chia Seeds');
INSERT INTO wishlist (itemName) VALUES ('Organic Blueberries');
INSERT INTO wishlist (itemName) VALUES ('Organic Sweet Potatoes');
INSERT INTO wishlist (itemName) VALUES ('Organic Coconut Oil');
