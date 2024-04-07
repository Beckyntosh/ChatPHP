CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_name VARCHAR(255) NOT NULL,
    product_description TEXT,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Organic Protein Powder', 'Plant-based protein powder for post-workout recovery');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Yoga Mat', 'High-quality non-slip yoga mat for home practice');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Essential Oil Diffuser', 'Aromatherapy diffuser for relaxation and stress relief');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Healthy Cookbook', 'Collection of nutritious recipes for balanced meals');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Fitness Tracker', 'Smart wearable device to monitor daily activity and workouts');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Herbal Tea Sampler', 'Variety pack of herbal teas for different wellness benefits');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Foam Roller', 'Muscle recovery foam roller for post-exercise use');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Meditation Cushion', 'Comfortable cushion for mindfulness and meditation practice');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Reusable Water Bottle', 'Environmentally-friendly water bottle for hydration on-the-go');
INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES (1, 'Sleep Mask', 'Soft and adjustable eye mask for better sleep quality');
