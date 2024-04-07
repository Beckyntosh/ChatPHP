CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50)
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(8,2) NOT NULL,
    image VARCHAR(255)
);

INSERT INTO users (username, password, email) VALUES 
('john_doe', 'password123', 'john.doe@example.com'),
('jane_smith', 'abc123', 'jane.smith@example.com'),
('alice_wonderland', 'p@ssw0rd', 'alice.wonderland@example.com'),
('bob_marley', 'bob123', 'bob.marley@example.com'),
('emma_stone', 'stone456', 'emma.stone@example.com');

INSERT INTO products (name, description, price, image) VALUES 
('Watch A', 'Elegant watch with leather strap', 99.99, 'watch_A.jpg'),
('Watch B', 'Sporty chronograph watch with stainless steel bracelet', 149.99, 'watch_B.jpg'),
('Watch C', 'Minimalist design watch with mesh strap', 79.99, 'watch_C.jpg'),
('Watch D', 'Smartwatch with fitness tracking features', 199.99, 'watch_D.jpg'),
('Watch E', 'Luxury watch with diamond encrusted dial', 499.99, 'watch_E.jpg');
