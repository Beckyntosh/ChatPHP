CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image_url VARCHAR(255),
  category VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, image_url, category) VALUES ('Product 1', 'Description for Product 1', 'Image URL 1', 'Category A');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 2', 'Description for Product 2', 'Image URL 2', 'Category B');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 3', 'Description for Product 3', 'Image URL 3', 'Category C');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 4', 'Description for Product 4', 'Image URL 4', 'Category D');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 5', 'Description for Product 5', 'Image URL 5', 'Category E');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 6', 'Description for Product 6', 'Image URL 6', 'Category F');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 7', 'Description for Product 7', 'Image URL 7', 'Category G');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 8', 'Description for Product 8', 'Image URL 8', 'Category H');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 9', 'Description for Product 9', 'Image URL 9', 'Category I');
INSERT INTO products (name, description, image_url, category) VALUES ('Product 10', 'Description for Product 10', 'Image URL 10', 'Category J');
