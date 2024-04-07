CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO users (username, email) VALUES ('MikeJohnson', 'mikejohnson@example.com');
INSERT INTO users (username, email) VALUES ('SarahBrown', 'sarahbrown@example.com');
INSERT INTO users (username, email) VALUES ('ChrisLee', 'chrislee@example.com');
INSERT INTO users (username, email) VALUES ('EmilyGarcia', 'emilygarcia@example.com');
INSERT INTO users (username, email) VALUES ('AlexMartinez', 'alexmartinez@example.com');
INSERT INTO users (username, email) VALUES ('LauraNguyen', 'lauranguyen@example.com');
INSERT INTO users (username, email) VALUES ('KevinWong', 'kevinwong@example.com');
INSERT INTO users (username, email) VALUES ('AmandaTaylor', 'amandataylor@example.com');

INSERT INTO products (name, description, price) VALUES ('Silver Necklace', 'Beautiful post-apocalyptic style silver necklace', 25.99);
INSERT INTO products (name, description, price) VALUES ('Brass Earrings', 'Trendy post-apocalyptic style brass earrings', 15.99);
INSERT INTO products (name, description, price) VALUES ('Copper Bracelet', 'Unique post-apocalyptic style copper bracelet', 20.50);
INSERT INTO products (name, description, price) VALUES ('Steel Ring', 'Durable post-apocalyptic style steel ring', 18.75);
INSERT INTO products (name, description, price) VALUES ('Bronze Pendant', 'Elegant post-apocalyptic style bronze pendant', 30.00);
INSERT INTO products (name, description, price) VALUES ('Titanium Anklet', 'Modern post-apocalyptic style titanium anklet', 22.50);
INSERT INTO products (name, description, price) VALUES ('Aluminum Cufflinks', 'Sleek post-apocalyptic style aluminum cufflinks', 17.25);
INSERT INTO products (name, description, price) VALUES ('Gold Chain', 'Luxurious post-apocalyptic style gold chain', 35.75);
INSERT INTO products (name, description, price) VALUES ('Platinum Brooch', 'Sophisticated post-apocalyptic style platinum brooch', 40.00);
INSERT INTO products (name, description, price) VALUES ('Rustic Pendant', 'Handcrafted post-apocalyptic style rustic pendant', 28.99);
