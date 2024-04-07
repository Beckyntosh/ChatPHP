CREATE TABLE IF NOT EXISTS Watches (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        brand VARCHAR(30) NOT NULL,
        model VARCHAR(30) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        reg_date TIMESTAMP
);

INSERT INTO Watches (brand, model, price) VALUES 
('Rolex', 'Submariner', 7499.99),
('Omega', 'Seamaster', 4999.99),
('TAG Heuer', 'Carrera', 5899.99),
('Seiko', 'Presage', 899.99),
('Citizen', 'Eco-Drive', 299.99),
('Bulova', 'Precisionist', 399.99),
('Tissot', 'Le Locle', 1299.99),
('Hamilton', 'Khaki King', 649.99),
('Movado', 'Museum Classic', 199.99),
('Longines', 'Master Collection', 1999.99);
