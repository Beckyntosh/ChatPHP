CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(50) NOT NULL,
    item_description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO wishlist (item_name, item_description) VALUES ('Book', 'Science fiction novel');
INSERT INTO wishlist (item_name, item_description) VALUES ('Headphones', 'Wireless noise-cancelling headphones');
INSERT INTO wishlist (item_name, item_description) VALUES ('Camera', 'DSLR camera for photography');
INSERT INTO wishlist (item_name, item_description) VALUES ('Smartwatch', 'Fitness tracker with heart rate monitor');
INSERT INTO wishlist (item_name, item_description) VALUES ('Gaming Console', 'Latest gaming console for entertainment');
INSERT INTO wishlist (item_name, item_description) VALUES ('Plant', 'Indoor plant for decoration');
INSERT INTO wishlist (item_name, item_description) VALUES ('Coffee Maker', 'Espresso machine for coffee lovers');
INSERT INTO wishlist (item_name, item_description) VALUES ('Backpack', 'Waterproof backpack for travel');
INSERT INTO wishlist (item_name, item_description) VALUES ('Fitness Tracker', 'Track daily steps and calories burned');
INSERT INTO wishlist (item_name, item_description) VALUES ('Speaker', 'Bluetooth speaker for music');