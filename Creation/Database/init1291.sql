CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dietary_preference VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS meal_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    day_of_week VARCHAR(255) NOT NULL,
    meal VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (dietary_preference) VALUES ('vegan');
INSERT INTO users (dietary_preference) VALUES ('vegetarian');
INSERT INTO users (dietary_preference) VALUES ('vegan');
INSERT INTO users (dietary_preference) VALUES ('omnivore');
INSERT INTO users (dietary_preference) VALUES ('vegetarian');
INSERT INTO users (dietary_preference) VALUES ('omnivore');
INSERT INTO users (dietary_preference) VALUES ('vegan');
INSERT INTO users (dietary_preference) VALUES ('vegetarian');
INSERT INTO users (dietary_preference) VALUES ('vegan');
INSERT INTO users (dietary_preference) VALUES ('omnivore');

INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (1, 'Monday', 'Meal 1');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (2, 'Tuesday', 'Meal 2');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (3, 'Wednesday', 'Meal 3');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (4, 'Thursday', 'Meal 4');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (5, 'Friday', 'Meal 5');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (6, 'Saturday', 'Meal 6');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (7, 'Sunday', 'Meal 7');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (8, 'Monday', 'Meal 8');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (9, 'Tuesday', 'Meal 9');
INSERT INTO meal_plans (user_id, day_of_week, meal) VALUES (10, 'Wednesday', 'Meal 10');
