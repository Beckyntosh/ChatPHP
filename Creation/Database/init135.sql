CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    productDescription TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (customerName, email, productDescription) VALUES
('Alice', 'alice@example.com', 'Custom shampoo with natural ingredients'),
('Bob', 'bob@example.com', 'Handmade soap with lavender scent'),
('Charlie', 'charlie@example.com', 'Custom skincare set for sensitive skin'),
('David', 'david@example.com', 'Personalized perfume with unique fragrance'),
('Eve', 'eve@example.com', 'Custom hair oil infused with herbs'),
('Frank', 'frank@example.com', 'Bespoke body lotion for dry skin'),
('Grace', 'grace@example.com', 'Tailor-made face mask for acne-prone skin'),
('Henry', 'henry@example.com', 'Custom bath salts with essential oils'),
('Ivy', 'ivy@example.com', 'Handcrafted lip balm with organic ingredients'),
('Jack', 'jack@example.com', 'Personalized body scrub with exfoliating particles');
