CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        image_url VARCHAR(1024)
    );

CREATE TABLE IF NOT EXISTS comparisons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product1_id INT,
        product2_id INT,
        FOREIGN KEY (product1_id) REFERENCES products(id),
        FOREIGN KEY (product2_id) REFERENCES products(id)
    );

INSERT INTO products (name, description, image_url) VALUES
        ('LOreal Paris Elvive Dream Lengths Frizz Killer Serum', 'A serum to fight frizz and split ends', 'https://example.com/haircare1.jpg'),
        ('Pantene Pro-V Blends Rose Water Shampoo', 'Gentle cleansing with a blend of rose water', 'https://example.com/haircare2.jpg'),
        ('Dove Amplified Textures Shine & Moisture Finishing Gel', 'Defines curls and adds shine', 'https://example.com/haircare3.jpg'),
        ('Herbal Essences Bio Renew Arabica Coffee Fruit Shampoo', 'Infused with real arabica coffee', 'https://example.com/haircare4.jpg'),
        ('OGX Strength & Length + Golden Turmeric Conditioner', 'Helps promote long, strong hair', 'https://example.com/haircare5.jpg'),
        ('Aussie 3 Minute Miracle Moist Deep Conditioner', 'Intense hydration in just 3 minutes', 'https://example.com/haircare6.jpg'),
        ('Shea Moisture Coconut & Hibiscus Curl Enhancing Smoothie', 'Defines curls and reduces frizz', 'https://example.com/haircare7.jpg'),
        ('Tresemme Between Washes Volumizing Dry Shampoo', 'Revives and refreshes hair between washes', 'https://example.com/haircare8.jpg'),
        ('Garnier Fructis Sleek Shot In-Shower Styler', 'Transforms hair for a sleek, smooth look', 'https://example.com/haircare9.jpg'),
        ('Cantu Shea Butter Thermal Shield Heat Protectant', 'Protects hair from heat damage', 'https://example.com/haircare10.jpg');
