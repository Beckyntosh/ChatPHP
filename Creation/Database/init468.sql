CREATE TABLE recipes_conversion (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient_name VARCHAR(255) NOT NULL,
    from_unit VARCHAR(50),
    to_unit VARCHAR(50),
    conversion_factor DECIMAL(10,5) NOT NULL
);

INSERT INTO recipes_conversion (ingredient_name, from_unit, to_unit, conversion_factor) VALUES
    ('Flour', 'cups', 'grams', 120),
    ('Sugar', 'cups', 'grams', 200),
    ('Butter', 'cups', 'grams', 227),
    ('Milk', 'cups', 'milliliters', 240),
    ('Salt', 'teaspoons', 'grams', 5.69),
    ('Oil', 'tablespoons', 'milliliters', 15),
    ('Eggs', 'units', 'grams', 50),
    ('Cheese', 'ounces', 'grams', 28.35),
    ('Rice', 'cups', 'grams', 185),
    ('Honey', 'tablespoons', 'grams', 21.25);
