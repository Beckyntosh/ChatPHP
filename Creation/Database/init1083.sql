CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_name VARCHAR(255),
    rating INT CHECK(rating >= 1 AND rating <= 5),
    review_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);

INSERT INTO products (name, description, image_url) VALUES ('Product1', 'Description1', 'image1.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product2', 'Description2', 'image2.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product3', 'Description3', 'image3.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product4', 'Description4', 'image4.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product5', 'Description5', 'image5.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product6', 'Description6', 'image6.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product7', 'Description7', 'image7.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product8', 'Description8', 'image8.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product9', 'Description9', 'image9.jpg');
INSERT INTO products (name, description, image_url) VALUES ('Product10', 'Description10', 'image10.jpg');
