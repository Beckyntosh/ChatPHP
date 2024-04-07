CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (name, category, price) VALUES ('Football', 'Sports Equipment', 25.00);
INSERT INTO products (name, category, price) VALUES ('Basketball', 'Sports Equipment', 20.00);
INSERT INTO products (name, category, price) VALUES ('Tennis Racket', 'Sports Equipment', 50.00);
INSERT INTO products (name, category, price) VALUES ('Golf Clubs', 'Sports Equipment', 150.00);
INSERT INTO products (name, category, price) VALUES ('Yoga Mat', 'Fitness Equipment', 15.00);
INSERT INTO products (name, category, price) VALUES ('Dumbbells', 'Fitness Equipment', 30.00);
INSERT INTO products (name, category, price) VALUES ('Running Shoes', 'Athletic Gear', 80.00);
INSERT INTO products (name, category, price) VALUES ('Swimming Goggles', 'Swim Gear', 10.00);
INSERT INTO products (name, category, price) VALUES ('Cycling Helmet', 'Cycling Gear', 40.00);
INSERT INTO products (name, category, price) VALUES ('Boxing Gloves', 'Martial Arts Gear', 50.00);
