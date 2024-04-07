CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30),
    meal_name VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Tuesday', 'Lunch', 'Salad', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Wednesday', 'Dinner', 'Grilled Chicken', 'Non-Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Thursday', 'Breakfast', 'Smoothie', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Friday', 'Lunch', 'Pasta', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Saturday', 'Dinner', 'Steak', 'Non-Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Sunday', 'Lunch', 'Sandwich', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Monday', 'Dinner', 'Rice Bowl', 'Vegan');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Wednesday', 'Lunch', 'Soup', 'Vegetarian');
INSERT INTO meal_plans (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Friday', 'Dinner', 'Pizza', 'Non-Vegetarian');
