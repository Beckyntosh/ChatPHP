CREATE TABLE IF NOT EXISTS languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10),
    name VARCHAR(100)
);

INSERT INTO languages (code, name) VALUES
('en', 'English'),
('es', 'Spanish'),
('fr', 'French')
ON DUPLICATE KEY UPDATE code=VALUES(code), name=VALUES(name);

CREATE TABLE IF NOT EXISTS product_translations (
    product_id INT,
    language_id INT,
    name VARCHAR(255),
    description TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (language_id) REFERENCES languages(id)
);

INSERT INTO product_translations (product_id, language_id, name, description) VALUES
(1, 1, 'Shoes A', 'Comfortable and stylish shoes for everyday wear.'),
(2, 1, 'Boots B', 'Trendy boots for any occasion.'),
(3, 2, 'Zapatos C', 'Zapatos cómodos y elegantes para el uso diario.'),
(4, 2, 'Botas D', 'Botas elegantes para todas las ocasiones.'),
(5, 3, 'Chaussures E', 'Chaussures confortables et élégantes pour un usage quotidien.'),
(6, 3, 'Bottes F', 'Bottes tendance pour nimporte quelle occasion.');

-- Insert more values as needed