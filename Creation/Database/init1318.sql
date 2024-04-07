CREATE TABLE meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
meal_plan_name VARCHAR(50) NOT NULL,
dietary_preference VARCHAR(30) NOT NULL,
days INT(2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 1', 'vegan', 7);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 2', 'vegetarian', 5);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 3', 'non-vegetarian', 6);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 4', 'vegan', 4);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 5', 'vegetarian', 3);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 6', 'non-vegetarian', 2);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 7', 'vegan', 7);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 8', 'vegetarian', 6);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 9', 'non-vegetarian', 5);
INSERT INTO meal_plans (meal_plan_name, dietary_preference, days) VALUES ('Plan 10', 'vegan', 4);