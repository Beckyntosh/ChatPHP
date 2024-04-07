CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO products (product_name, brand, price, description) VALUES ('Dog Food', 'Acme Pet Supplies', 19.99, 'Premium dog food with all-natural ingredients');
INSERT INTO products (product_name, brand, price, description) VALUES ('Cat Litter', 'Feline Fresh', 12.50, 'Clumping cat litter for odor control');
INSERT INTO products (product_name, brand, price, description) VALUES ('Fish Tank', 'Aquarium Masters', 99.99, '10-gallon glass aquarium for fish');
INSERT INTO products (product_name, brand, price, description) VALUES ('Bird Cage', 'Prevue Hendryx', 49.99, 'Medium-sized bird cage with feeder');
INSERT INTO products (product_name, brand, price, description) VALUES ('Hamster Wheel', 'Kaytee', 5.99, 'Exercise wheel for hamsters and small rodents');
INSERT INTO products (product_name, brand, price, description) VALUES ('Reptile Heat Lamp', 'Zoo Med', 15.75, 'Heat lamp for reptiles');
INSERT INTO products (product_name, brand, price, description) VALUES ('Rabbit Hutch', 'Ware Manufacturing', 69.99, 'Outdoor hutch for rabbits with secure fencing');
INSERT INTO products (product_name, brand, price, description) VALUES ('Pet Grooming Kit', 'Andis', 29.99, 'Clipper and grooming accessories for pets');
INSERT INTO products (product_name, brand, price, description) VALUES ('Dog Collar', 'Blueberry Pet', 8.49, 'Adjustable nylon collar for dogs');
INSERT INTO products (product_name, brand, price, description) VALUES ('Cat Toy Set', 'SmartyKat', 14.99, 'Interactive toys for cats');
