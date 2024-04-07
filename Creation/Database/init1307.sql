CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(30) NOT NULL,
    dietary_preference ENUM('none', 'vegan', 'vegetarian', 'gluten_free') NOT NULL,
    week_start_date DATE NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    meal_plan_id INT(6) UNSIGNED,
    day ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    meal_type ENUM('Breakfast', 'Lunch', 'Dinner') NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (meal_plan_id) REFERENCES meal_plans(id)
);

INSERT INTO meal_plans (plan_name, dietary_preference, week_start_date) VALUES ('Meal Plan 1', 'vegan', '2023-01-02');
INSERT INTO meal_plans (plan_name, dietary_preference, week_start_date) VALUES ('Meal Plan 2', 'vegetarian', '2023-01-09');

INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (1, 'Monday', 'Breakfast', 'Avocado toast');
INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (1, 'Monday', 'Lunch', 'Quinoa salad');
INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (1, 'Monday', 'Dinner', 'Vegetable stir-fry');

INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (2, 'Tuesday', 'Breakfast', 'Smoothie bowl');
INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (2, 'Tuesday', 'Lunch', 'Falafel wrap');
INSERT INTO meals (meal_plan_id, day, meal_type, description) VALUES (2, 'Tuesday', 'Dinner', 'Eggplant parmesan');