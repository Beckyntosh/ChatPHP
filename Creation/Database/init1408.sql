CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal VARCHAR(255) NOT NULL,
    product VARCHAR(255),
    style VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS water_intake (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    liters DECIMAL(3,2) NOT NULL,
    date DATE NOT NULL,
    reg_date TIMESTAMP
);

-- Insert sample data
INSERT INTO habits (goal, product, style) VALUES ('Drink 2 liters of water daily', 'Sunglasses', 'romantic');
INSERT INTO habits (goal, product, style) VALUES ('Exercise for 30 minutes daily', 'Fitness tracker', 'sporty');
INSERT INTO habits (goal, product, style) VALUES ('Read 20 pages daily', 'E-reader', 'classic');
INSERT INTO habits (goal, product, style) VALUES ('Meditate for 10 minutes daily', 'Candles', 'cozy');
INSERT INTO habits (goal, product, style) VALUES ('Eat 5 servings of fruits and vegetables daily', 'Blender', 'healthy');
INSERT INTO habits (goal, product, style) VALUES ('Write in journal daily', 'Fountain pen', 'vintage');
INSERT INTO habits (goal, product, style) VALUES ('Get 8 hours of sleep daily', 'Pillow', 'comfortable');
INSERT INTO habits (goal, product, style) VALUES ('Practice a new language for 20 minutes daily', 'Notebook', 'educational');
INSERT INTO habits (goal, product, style) VALUES ('Take a walk outside daily', 'Sneakers', 'athletic');
INSERT INTO habits (goal, product, style) VALUES ('Cook a new recipe daily', 'Cookware set', 'modern');
