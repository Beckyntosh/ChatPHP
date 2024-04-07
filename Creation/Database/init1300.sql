CREATE TABLE IF NOT EXISTS Meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
recipe_name VARCHAR(50),
dietary_preferences VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Monday', 'Breakfast', 'Oatmeal', 'Vegetarian');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Tuesday', 'Lunch', 'Grilled Chicken Salad', 'Omnivore');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Wednesday', 'Dinner', 'Eggplant Parmesan', 'Vegetarian');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Thursday', 'Breakfast', 'Smoothie Bowl', 'Vegan');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Friday', 'Lunch', 'Quinoa Salad', 'Vegetarian');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Saturday', 'Dinner', 'Chickpea Curry', 'Vegan');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Sunday', 'Breakfast', 'Avocado Toast', 'Vegetarian');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Monday', 'Lunch', 'Caesar Salad', 'Omnivore');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Tuesday', 'Dinner', 'Spaghetti Bolognese', 'Omnivore');
INSERT INTO Meals (day, meal_type, recipe_name, dietary_preferences) VALUES ('Wednesday', 'Breakfast', 'Pancakes', 'Vegetarian');