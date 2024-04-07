CREATE TABLE IF NOT EXISTS ingredient_conversion (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient_name VARCHAR(30) NOT NULL,
    from_unit VARCHAR(20) NOT NULL,
    to_unit VARCHAR(20) NOT NULL,
    conversion_factor DECIMAL(10,4) NOT NULL
);

INSERT INTO ingredient_conversion (ingredient_name, from_unit, to_unit, conversion_factor) VALUES
('Sugar', 'cup', 'gram', 200),
('Flour', 'cup', 'gram', 125),
('Butter', 'tablespoon', 'gram', 14),
('Salt', 'teaspoon', 'gram', 5),
('Milk', 'cup', 'milliliter', 240),
('Oil', 'teaspoon', 'milliliter', 5),
('Egg', 'unit', 'gram', 50),
('Honey', 'cup', 'gram', 340),
('Yogurt', 'cup', 'gram', 250),
('Rice', 'cup', 'gram', 200);
