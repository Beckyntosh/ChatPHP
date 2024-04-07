CREATE TABLE IF NOT EXISTS dietary_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(50) NOT NULL UNIQUE,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    day_of_week VARCHAR(10) NOT NULL,
    meal_time VARCHAR(10) NOT NULL,
    recipe TEXT NOT NULL,
    dietary_preference_id INT(6) UNSIGNED,
    FOREIGN KEY (dietary_preference_id) REFERENCES dietary_preferences(id)
);

INSERT INTO dietary_preferences (preference) VALUES ('Vegan');
INSERT INTO dietary_preferences (preference) VALUES ('Vegetarian');
INSERT INTO dietary_preferences (preference) VALUES ('Gluten-Free');
INSERT INTO dietary_preferences (preference) VALUES ('Keto');
INSERT INTO dietary_preferences (preference) VALUES ('Paleo');
INSERT INTO dietary_preferences (preference) VALUES ('Pescatarian');
INSERT INTO dietary_preferences (preference) VALUES ('Mediterranean');
INSERT INTO dietary_preferences (preference) VALUES ('Low-Carb');
INSERT INTO dietary_preferences (preference) VALUES ('Dairy-Free');
INSERT INTO dietary_preferences (preference) VALUES ('Flexitarian');
