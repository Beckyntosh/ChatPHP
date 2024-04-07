CREATE TABLE IF NOT EXISTS meals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dietary_preference VARCHAR(30) NOT NULL,
day_of_week VARCHAR(10) NOT NULL,
meal_name VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Monday', 'Vegan Stir-Fry');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Tuesday', 'Vegan Tacos');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Wednesday', 'Vegan Buddha Bowl');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Thursday', 'Vegan Lentil Soup');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Friday', 'Vegan Pizza');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Saturday', 'Vegan Pad Thai');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Sunday', 'Vegan Roasted Vegetable Salad');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Monday', 'Vegan Avocado Toast');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Tuesday', 'Vegan Quinoa Bowl');
INSERT INTO meals (dietary_preference, day_of_week, meal_name) VALUES ('vegan', 'Wednesday', 'Vegan Curry');