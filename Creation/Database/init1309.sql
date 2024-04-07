CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_plan TEXT NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO meal_plans (day, meal_plan, dietary_preference) VALUES 
('Monday', 'Oatmeal for breakfast, Salad for lunch, Stir-fry for dinner', 'vegan'),
('Tuesday', 'Smoothie for breakfast, Pasta for lunch, Tofu curry for dinner', 'vegetarian'),
('Wednesday', 'Eggs for breakfast, Sandwich for lunch, Quinoa bowl for dinner', 'gluten-free'),
('Thursday', 'Pancakes for breakfast, Soup for lunch, Sushi for dinner', 'none'),
('Friday', 'Toast for breakfast, Pizza for lunch, Burrito for dinner', 'vegan'),
('Saturday', 'Muffins for breakfast, Salad for lunch, Stir-fry for dinner', 'vegetarian'),
('Sunday', 'Granola for breakfast, Pasta for lunch, Tofu curry for dinner', 'gluten-free'),
('Monday', 'Omelette for breakfast, Salad for lunch, Stir-fry for dinner', 'vegan'),
('Tuesday', 'Smoothie for breakfast, Sandwich for lunch, Quinoa bowl for dinner', 'vegetarian'),
('Wednesday', 'Yogurt for breakfast, Soup for lunch, Sushi for dinner', 'none');
