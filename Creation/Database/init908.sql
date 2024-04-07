CREATE TABLE poll_responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO products (name) VALUES ('Fruity Fantasy'), ('Ocean Breeze'), ('Citrus Splash'), ('Floral Bloom'), ('Exotic Woods'), ('Berry Burst'), ('Vanilla Dream'), ('Spicy Sensation'), ('Musk Magic'), ('Coconut Bliss');
