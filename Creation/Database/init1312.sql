CREATE TABLE IF NOT EXISTS MealPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plan_name VARCHAR(50) NOT NULL,
meal_type VARCHAR(50),
dietary_pref VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO MealPlans (plan_name, meal_type, dietary_pref) VALUES 
('Plan 1', 'Breakfast', 'Vegan'),
('Plan 2', 'Lunch', 'Vegetarian'),
('Plan 3', 'Dinner', 'Vegan'),
('Plan 4', 'Breakfast', 'Gluten-Free'),
('Plan 5', 'Lunch', 'Vegan'),
('Plan 6', 'Dinner', 'Vegetarian'),
('Plan 7', 'Breakfast', 'Vegan'),
('Plan 8', 'Lunch', 'Gluten-Free'),
('Plan 9', 'Dinner', 'Vegan'),
('Plan 10', 'Breakfast', 'Vegetarian');