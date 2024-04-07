CREATE TABLE IF NOT EXISTS meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
meal_name VARCHAR(30) NOT NULL,
day VARCHAR(10) NOT NULL,
dietary_preference VARCHAR(20),
reg_date TIMESTAMP
);

INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Breakfast', 'Monday', 'Vegan');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Lunch', 'Tuesday', 'None');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Dinner', 'Wednesday', 'Vegetarian');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Snack', 'Thursday', 'None');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Brunch', 'Friday', 'Gluten-Free');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Dinner', 'Saturday', 'Vegan');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Breakfast', 'Sunday', 'Vegetarian');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Lunch', 'Monday', 'Vegan');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Dinner', 'Tuesday', 'None');
INSERT INTO meals (meal_name, day, dietary_preference) VALUES ('Snack', 'Wednesday', 'Vegetarian');
