CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(30),
    price DECIMAL(10,2),
    imageURL VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price, imageURL) VALUES
('Vitamin C', 'Vitamin C 1000mg', 'Vitamins', 9.99, 'images/vitamin_c.png'),
('Vitamin D3', 'Vitamin D3 5000 IU', 'Vitamins', 12.49, 'images/vitamin_d3.png'),
('Multivitamin', 'Multivitamin for all', 'Vitamins', 15.99, 'images/multivitamin.png'),
('Vitamin B12', 'Vitamin B12 1000mcg', 'Vitamins', 7.99, 'images/vitamin_b12.png'),
('Calcium Supplement', 'Calcium with Vitamin D', 'Vitamins', 10.99, 'images/calcium.png'),
('Omega-3 Fish Oil', 'Omega-3 1000mg', 'Vitamins', 14.99, 'images/omega3.png'),
('Probiotic Blend', 'Digestive Health Probiotic', 'Vitamins', 17.49, 'images/probiotic.png'),
('Ashwagandha Extract', 'Stress Relief supplement', 'Vitamins', 21.99, 'images/ashwagandha.png'),
('Magnesium Citrate', 'Magnesium Citrate tablets', 'Vitamins', 8.49, 'images/magnesium.png'),
('Zinc Supplement', 'Zinc 50mg tablets', 'Vitamins', 5.99, 'images/zinc.png')
ON DUPLICATE KEY UPDATE name=name;
