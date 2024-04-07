CREATE TABLE IF NOT EXISTS meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day_of_week VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
dietary_preference VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Monday', 'Breakfast', 'Oatmeal with fruits', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Tuesday', 'Lunch', 'Greek Salad', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Wednesday', 'Dinner', 'Grilled Salmon with Asparagus', 'None');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Thursday', 'Breakfast', 'Smoothie Bowl', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Friday', 'Lunch', 'Quinoa Salad', 'Gluten-Free');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Saturday', 'Dinner', 'Pasta Primavera', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Sunday', 'Breakfast', 'Avocado Toast', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Monday', 'Lunch', 'Falafel Wrap', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Tuesday', 'Dinner', 'Chicken Stir Fry', 'None');
INSERT INTO meal_plans (day_of_week, meal_type, description, dietary_preference) VALUES ('Wednesday', 'Breakfast', 'Egg Muffins', 'None');