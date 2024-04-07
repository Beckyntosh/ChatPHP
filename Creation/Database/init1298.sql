CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meal_name VARCHAR(255) NOT NULL,
    day_of_week VARCHAR(20) NOT NULL,
    dietary_preference VARCHAR(50),
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Breakfast Burrito', 'Monday', 'Vegetarian');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Avocado Toast', 'Tuesday', 'Vegan');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Mushroom Risotto', 'Wednesday', 'Gluten-Free');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Quinoa Salad', 'Thursday', 'Vegetarian');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Chickpea Curry', 'Friday', 'Vegan');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Grilled Vegetables', 'Saturday', 'Vegetarian');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Pasta Primavera', 'Sunday', 'Vegetarian');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Stir-Fry Tofu', 'Monday', 'Vegan');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Caprese Salad', 'Wednesday', 'Vegetarian');
INSERT INTO meals (meal_name, day_of_week, dietary_preference) VALUES ('Cauliflower Rice Bowl', 'Friday', 'Gluten-Free');
