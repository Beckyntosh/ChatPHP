CREATE TABLE IF NOT EXISTS meal_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(30) NOT NULL,
    meal VARCHAR(50),
    dietary_preference VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Monday', 'Grilled vegetables', 'vegan');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Tuesday', 'Spinach salad', 'vegetarian');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Wednesday', 'Quinoa bowl', 'gluten-free');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Thursday', 'Chickpea curry', 'vegan');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Friday', 'Pasta with tomato sauce', 'vegetarian');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Saturday', 'Stir-fried tofu', 'vegan');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Sunday', 'Roasted chicken', 'none');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Monday', 'Bean soup', 'vegan');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Tuesday', 'Eggplant Parmesan', 'vegetarian');
INSERT INTO meal_plan (day, meal, dietary_preference) VALUES ('Wednesday', 'Salmon with quinoa', 'none');