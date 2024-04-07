CREATE TABLE IF NOT EXISTS saved_carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cart_contents TEXT NOT NULL
);

INSERT INTO saved_carts (user_id, cart_contents) VALUES (1, '["1:2", "2:1"]'), (2, '["3:3", "4:1"]'), (3, '["5:2", "6:1"]'), (4, '["7:2", "8:1"]'), (5, '["9:3", "10:1"]'), (6, '["11:2", "12:1"]'), (7, '["13:2", "14:1"]'), (8, '["15:3", "16:1"]'), (9, '["17:2", "18:1"]'), (10, '["19:2", "20:1"]');