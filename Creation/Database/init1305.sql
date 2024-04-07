CREATE TABLE meal_plan (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  day VARCHAR(30) NOT NULL,
  meal_type VARCHAR(30) NOT NULL,
  dish_name VARCHAR(50),
  dietary_preferences VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegan');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Monday', 'Lunch', 'Salad', 'Vegetarian');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Monday', 'Dinner', 'Quinoa Bowl', 'Vegan');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Tuesday', 'Breakfast', 'Smoothie', 'Keto');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Tuesday', 'Lunch', 'Grilled Chicken', 'Paleo');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Tuesday', 'Dinner', 'Zoodles', 'Low-carb');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Wednesday', 'Breakfast', 'Avocado Toast', 'Vegetarian');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Wednesday', 'Lunch', 'Chickpea Salad', 'Vegan');
INSERT INTO meal_plan (day, meal_type, dish_name, dietary_preferences) VALUES ('Wednesday', 'Dinner', 'Stir-fry Tofu', 'Vegan');