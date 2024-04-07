CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    recipe VARCHAR(255) NOT NULL,
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Monday', 'Breakfast', 'Avocado Toast', 'Vegan');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Monday', 'Lunch', 'Quinoa Salad', 'Vegetarian');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Tuesday', 'Dinner', 'Grilled Salmon', 'None');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Wednesday', 'Breakfast', 'Smoothie Bowl', 'Vegetarian');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Thursday', 'Lunch', 'Caprese Sandwich', 'Vegetarian');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Friday', 'Dinner', 'Pasta Primavera', 'Vegetarian');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Saturday', 'Breakfast', 'Oatmeal', 'Gluten-Free');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Saturday', 'Lunch', 'Tofu Stir Fry', 'Vegan');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Sunday', 'Dinner', 'Roast Chicken', 'None');
INSERT INTO meal_plans (day, meal_type, recipe, dietary_preference) VALUES ('Sunday', 'Lunch', 'Falafel Salad', 'Vegan');
