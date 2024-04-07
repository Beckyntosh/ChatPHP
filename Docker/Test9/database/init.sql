CREATE TABLE IF NOT EXISTS saved_carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    cart_content TEXT NOT NULL,
    save_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO saved_carts (session_id, cart_content) VALUES
('session_1', '{"itemId":1, "itemName": "Dress", "price": 50}'),
('session_2', '{"itemId":1, "itemName": "Shoes", "price": 70}'),
('session_3', '{"itemId":1, "itemName": "Pants", "price": 40}'),
('session_4', '{"itemId":1, "itemName": "Blouse", "price": 30}'),
('session_5', '{"itemId":1, "itemName": "T-shirt", "price": 20}'),
('session_6', '{"itemId":1, "itemName": "Jacket", "price": 60}'),
('session_7', '{"itemId":1, "itemName": "Skirt", "price": 35}'),
('session_8', '{"itemId":1, "itemName": "Sweater", "price": 45}'),
('session_9', '{"itemId":1, "itemName": "Coat", "price": 75}'),
('session_10', '{"itemId":1, "itemName": "Hat", "price": 15}');
