CREATE TABLE IF NOT EXISTS MealPlans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(30) NOT NULL,
    dietary_preference VARCHAR(30) NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    meal VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 1', 'Vegan', 'Monday', 'Avocado Toast');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 1', 'Vegetarian', 'Tuesday', 'Mushroom Risotto');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 2', 'Keto', 'Wednesday', 'Grilled Chicken Salad');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 2', 'Pescatarian', 'Thursday', 'Salmon with Quinoa');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 3', 'Vegan', 'Friday', 'Lentil Curry');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 3', 'Vegetarian', 'Saturday', 'Eggplant Parmesan');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 1', 'Vegan', 'Sunday', 'Chickpea Stir-fry');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 2', 'Keto', 'Monday', 'Zucchini Noodles with Pesto');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 3', 'Vegetarian', 'Tuesday', 'Caprese Salad');
INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES ('Meal Plan 1', 'Vegan', 'Wednesday', 'Quinoa Buddha Bowl');
