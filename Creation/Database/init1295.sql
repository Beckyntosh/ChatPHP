CREATE TABLE IF NOT EXISTS meal_plan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(50) NOT NULL,
    meal_type VARCHAR(50) NOT NULL,
    meal VARCHAR(100) NOT NULL,
    dietary_pref VARCHAR(50) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegan');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Tuesday', 'Lunch', 'Salad', 'Vegetarian');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Wednesday', 'Dinner', 'Tofu Stir Fry', 'Vegan');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Thursday', 'Breakfast', 'Smoothie', 'Vegan');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Friday', 'Lunch', 'Quinoa Bowl', 'Vegetarian');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Saturday', 'Dinner', 'Chickpea Curry', 'Vegan');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Sunday', 'Breakfast', 'Avocado Toast', 'Vegetarian');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Monday', 'Lunch', 'Bean Burrito', 'Vegan');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Tuesday', 'Dinner', 'Vegetable Stir Fry', 'Vegetarian');
INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('Wednesday', 'Breakfast', 'Chia Pudding', 'Vegan');