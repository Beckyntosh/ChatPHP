CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP
);

INSERT INTO products (name, description) VALUES ('iPhone 13', 'Latest model from Apple');
INSERT INTO products (name, description) VALUES ('Samsung Galaxy S21', 'Flagship device from Samsung');
INSERT INTO products (name, description) VALUES ('MacBook Pro', 'Powerful laptop for professionals');
INSERT INTO products (name, description) VALUES ('Google Pixel 6', 'Googles premium smartphone');
INSERT INTO products (name, description) VALUES ('Sony WH-1000XM4', 'Noise-canceling headphones');
INSERT INTO products (name, description) VALUES ('Fitbit Charge 5', 'Fitness tracker with built-in GPS');
INSERT INTO products (name, description) VALUES ('Amazon Kindle Paperwhite', 'E-reader with a high-resolution display');
INSERT INTO products (name, description) VALUES ('Dell XPS 13', 'Ultrabook with InfinityEdge display');
INSERT INTO products (name, description) VALUES ('Nespresso VertuoPlus', 'Coffee machine with barcode scanning technology');
INSERT INTO products (name, description) VALUES ('Nintendo Switch', 'Hybrid gaming console with portable and docked modes');
