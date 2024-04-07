CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  item_details TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, item_details) VALUES (1, '{"product": "Aloe Vera Supplements", "quantity": 2, "price": 25.99}'),
                                                    (1, '{"product": "Ginseng Supplements", "quantity": 1, "price": 19.99}'),
                                                    (2, '{"product": "Turmeric Supplements", "quantity": 3, "price": 12.50}'),
                                                    (2, '{"product": "Echinacea Supplements", "quantity": 1, "price": 14.99}'),
                                                    (3, '{"product": "Milk Thistle Supplements", "quantity": 2, "price": 18.75}'),
                                                    (3, '{"product": "Siberian Ginseng Supplements", "quantity": 1, "price": 22.50}'),
                                                    (4, '{"product": "Saw Palmetto Supplements", "quantity": 1, "price": 16.99}'),
                                                    (4, '{"product": "Horny Goat Weed Supplements", "quantity": 2, "price": 29.99}'),
                                                    (5, '{"product": "Garlic Supplements", "quantity": 1, "price": 10.75}'),
                                                    (5, '{"product": "Ashwagandha Supplements", "quantity": 2, "price": 27.50}');
