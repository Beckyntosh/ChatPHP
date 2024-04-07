CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    userID INT(6) NOT NULL,
    itemName VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO wishlist (userID, itemName) VALUES (1, 'Catan');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Ticket to Ride');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Pandemic');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Codenames');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Azul');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Splendor');
INSERT INTO wishlist (userID, itemName) VALUES (1, '7 Wonders');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Terraforming Mars');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Scythe');
INSERT INTO wishlist (userID, itemName) VALUES (1, 'Everdell');
