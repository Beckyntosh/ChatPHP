CREATE TABLE IF NOT EXISTS MEAL_PLAN (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(30) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    meal_name VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegan');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Tuesday', 'Lunch', 'Quinoa Salad', 'Vegetarian');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Wednesday', 'Dinner', 'Stir Fry Tofu', 'Vegan');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Thursday', 'Breakfast', 'Avocado Toast', 'Gluten-Free');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Friday', 'Lunch', 'Falafel Wrap', 'Vegetarian');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Saturday', 'Dinner', 'Vegetable Curry', 'Vegan');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Sunday', 'Breakfast', 'Smoothie Bowl', 'Vegan');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Monday', 'Lunch', 'Caprese Salad', 'Vegetarian');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Tuesday', 'Dinner', 'Bean Chili', 'Vegan');
INSERT INTO MEAL_PLAN (day_of_week, meal_type, meal_name, dietary_preference) VALUES ('Wednesday', 'Breakfast', 'Chia Pudding', 'Vegan');
