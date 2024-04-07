CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Guitar', 'Acoustic Guitar with Mahogany Top', 'String Instruments', 249.99, 10),
('Violin', 'Handcrafted Violin with Spruce Top', 'String Instruments', 199.99, 8),
('Drums', 'Full Drum Kit with Cymbals and Throne', 'Percussion Instruments', 599.99, 5),
('Keyboard', '88-Key Digital Piano with Weighted Keys', 'Keyboard Instruments', 499.99, 7),
('Saxophone', 'Alto Saxophone with Brass Body', 'Wind Instruments', 349.99, 4),
('Trumpet', 'Professional Bb Trumpet with Case', 'Brass Instruments', 299.99, 6),
('Flute', 'Silver Plated Concert Flute', 'Wind Instruments', 199.99, 3),
('Cello', 'Handcrafted Cello with Ebony Fittings', 'String Instruments', 799.99, 2),
('Harmonica', '10-Hole Diatonic Harmonica in C', 'Wind Instruments', 49.99, 12),
('Triangle', 'Professional Grade Musical Triangle', 'Percussion Instruments', 19.99, 15);
