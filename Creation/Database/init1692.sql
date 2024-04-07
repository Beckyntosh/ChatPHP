CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(50) NOT NULL,
  category VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO products (product_name, category, description, price)
VALUES ('Multivitamin', 'Health and Wellness', 'A daily supplement to support overall health', '19.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Protein Powder', 'Health and Wellness', 'Whey protein for muscle recovery and growth', '29.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Yoga Mat', 'Health and Wellness', 'Non-slip mat for yoga practice', '24.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Resistance Bands', 'Health and Wellness', 'Set of bands for strength training', '14.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Essential Oils Set', 'Health and Wellness', 'Variety of oils for aromatherapy', '21.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Healthy Snack Bars', 'Health and Wellness', 'On-the-go snacks with wholesome ingredients', '9.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Weighted Blanket', 'Health and Wellness', 'Blanket for relaxation and better sleep', '49.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Fitness Tracker', 'Health and Wellness', 'Wearable device to track activity and sleep', '79.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Foam Roller', 'Health and Wellness', 'Tool for self-myofascial release and muscle recovery', '12.99');

INSERT INTO products (product_name, category, description, price)
VALUES ('Aromatherapy Diffuser', 'Health and Wellness', 'Device to disperse essential oils into the air', '16.99');
