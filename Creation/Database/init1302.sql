CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    day VARCHAR(30) NOT NULL, 
    meal_type VARCHAR(30) NOT NULL,
    meal_name VARCHAR(100) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO meal_plans (day, meal_type, meal_name, dietary_preference) VALUES 
('Monday', 'Breakfast', 'Oatmeal', 'Vegan'),
('Monday', 'Lunch', 'Salad', ''),
('Monday', 'Dinner', 'Grilled Chicken', 'Gluten-Free'),
('Tuesday', 'Breakfast', 'Avocado Toast', 'Vegetarian'),
('Tuesday', 'Lunch', 'Quinoa Bowl', 'Vegan'),
('Tuesday', 'Dinner', 'Pasta Primavera', ''),
('Wednesday', 'Breakfast', 'Smoothie Bowl', 'Vegan'),
('Wednesday', 'Lunch', 'Vegetable Stir-Fry', ''),
('Wednesday', 'Dinner', 'Salmon with Asparagus', 'Gluten-Free'),
('Thursday', 'Breakfast', 'Greek Yogurt Parfait', 'Vegetarian');
