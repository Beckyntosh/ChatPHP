CREATE TABLE IF NOT EXISTS conversion_rates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ingredient VARCHAR(50) NOT NULL,
    unit_from VARCHAR(10) NOT NULL,
    unit_to VARCHAR(10) NOT NULL,
    conversion_rate DECIMAL(10, 5) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO conversion_rates (ingredient, unit_from, unit_to, conversion_rate, reg_date)
VALUES ('Sugar', 'cup', 'g', 200.00000, CURRENT_TIMESTAMP),
       ('Flour', 'cup', 'g', 125.00000, CURRENT_TIMESTAMP),
       ('Milk', 'cup', 'ml', 240.00000, CURRENT_TIMESTAMP),
       ('Butter', 'cup', 'g', 227.00000, CURRENT_TIMESTAMP),
       ('Eggs', 'unit', 'g', 50.00000, CURRENT_TIMESTAMP),
       ('Salt', 'teaspoon', 'g', 5.00000, CURRENT_TIMESTAMP),
       ('Honey', 'tablespoon', 'g', 21.00000, CURRENT_TIMESTAMP),
       ('Olive Oil', 'tablespoon', 'ml', 15.00000, CURRENT_TIMESTAMP),
       ('Vanilla Extract', 'teaspoon', 'ml', 5.00000, CURRENT_TIMESTAMP),
       ('Yogurt', 'cup', 'ml', 240.00000, CURRENT_TIMESTAMP);