CREATE TABLE IF NOT EXISTS dietary_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL,
    UNIQUE KEY (preference)
);

CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
    preference_id INT(6) UNSIGNED,
    FOREIGN KEY (preference_id) REFERENCES dietary_preferences(id) 
);

INSERT INTO dietary_preferences (preference) VALUES ('Vegan');
INSERT INTO dietary_preferences (preference) VALUES ('Vegetarian');
INSERT INTO dietary_preferences (preference) VALUES ('Gluten-Free');
INSERT INTO dietary_preferences (preference) VALUES ('Keto');

INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 1', 'Description 1', 'Monday', 1);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 2', 'Description 2', 'Tuesday', 2);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 3', 'Description 3', 'Wednesday', 3);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 4', 'Description 4', 'Thursday', 4);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 5', 'Description 5', 'Friday', 1);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 6', 'Description 6', 'Saturday', 2);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 7', 'Description 7', 'Sunday', 3);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 8', 'Description 8', 'Monday', 4);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 9', 'Description 9', 'Tuesday', 1);
INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES ('Meal 10', 'Description 10', 'Wednesday', 2);
