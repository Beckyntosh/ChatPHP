CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal VARCHAR(100) NOT NULL,
    dietary_preference VARCHAR(30),
    reg_date TIMESTAMP
);

INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Monday', 'Pasta', 'Vegetarian');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Tuesday', 'Salad', 'Vegan');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Wednesday', 'Stir-fry', 'None');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Thursday', 'Pizza', 'Gluten-Free');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Friday', 'Tacos', 'Vegan');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Saturday', 'Burger', 'None');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Sunday', 'Sushi', 'None');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Monday', 'Soup', 'Vegetarian');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Tuesday', 'Sandwich', 'None');
INSERT INTO meal_plans (day, meal, dietary_preference) VALUES ('Wednesday', 'Curry', 'Vegan');
