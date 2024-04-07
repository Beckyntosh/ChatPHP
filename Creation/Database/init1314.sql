CREATE TABLE IF NOT EXISTS MealPlans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    dish_name VARCHAR(255) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegan');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Tuesday', 'Lunch', 'Salad', 'Vegetarian');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Wednesday', 'Dinner', 'Stir Fry', 'Gluten-Free');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Thursday', 'Breakfast', 'Smoothie Bowl', 'Vegan');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Friday', 'Lunch', 'Sandwich', 'None');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Saturday', 'Dinner', 'Grilled Salmon', 'None');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Sunday', 'Breakfast', 'Avocado Toast', 'Vegetarian');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Monday', 'Lunch', 'Quinoa Salad', 'Vegan');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Tuesday', 'Dinner', 'Vegetable Curry', 'Gluten-Free');
INSERT INTO MealPlans (day, meal_type, dish_name, dietary_preference) VALUES ('Wednesday', 'Breakfast', 'Fruit Salad', 'None');
