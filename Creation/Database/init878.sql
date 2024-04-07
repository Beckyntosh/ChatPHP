CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO users (name, email, password) VALUES 
('Alice', 'alice@example.com', 'password1'),
('Bob', 'bob@example.com', 'password2'),
('Charlie', 'charlie@example.com', 'password3'),
('David', 'david@example.com', 'password4'),
('Eve', 'eve@example.com', 'password5'),
('Frank', 'frank@example.com', 'password6'),
('Grace', 'grace@example.com', 'password7'),
('Hank', 'hank@example.com', 'password8'),
('Ivy', 'ivy@example.com', 'password9'),
('Jack', 'jack@example.com', 'password10');

INSERT INTO products (name, description, price) VALUES 
('Lipstick', 'Long-lasting and vibrant color', 15.99),
('Eyeshadow Palette', 'Variety of shades for different looks', 25.99),
('Mascara', 'Lengthening and volumizing formula', 12.50),
('Foundation', 'Matte finish with buildable coverage', 20.00),
('Highlighter', 'Gives a natural glow to the skin', 18.75),
('Eyeliner', 'Waterproof and smudge-proof', 10.25),
('Blush', 'Adds a pop of color to the cheeks', 14.00),
('Setting Spray', 'Keeps makeup in place all day', 16.50),
('Bronzer', 'Creates a sun-kissed look', 13.75),
('Makeup Brushes Set', 'High-quality and cruelty-free', 30.00);
