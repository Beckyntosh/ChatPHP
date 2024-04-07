CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comparisons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product1_id INT NOT NULL,
    product2_id INT NOT NULL,
    FOREIGN KEY (product1_id) REFERENCES products (id) ON DELETE CASCADE,
    FOREIGN KEY (product2_id) REFERENCES products (id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO products (name, description, image) VALUES ('Hair Serum X', 'Description for Hair Serum X. It\'s designed for...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Shampoo Y', 'Description for Shampoo Y. It offers...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Conditioner Z', 'Description for Conditioner Z. It provides...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Hair Mask A', 'Description for Hair Mask A. It nourishes...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Styling Gel B', 'Description for Styling Gel B. It holds...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Hair Oil C', 'Description for Hair Oil C. It moisturizes...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Hair Spray D', 'Description for Hair Spray D. It sets...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Dry Shampoo E', 'Description for Dry Shampoo E. It refreshes...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Hair Mousse F', 'Description for Hair Mousse F. It adds...', 'image_url_here');
INSERT INTO products (name, description, image) VALUES ('Serum for Split Ends G', 'Description for Serum for Split Ends G. It repairs...', 'image_url_here');
