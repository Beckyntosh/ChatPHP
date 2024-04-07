CREATE TABLE IF NOT EXISTS dietary_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(15) NOT NULL,
    meal_time VARCHAR(15) NOT NULL,
    meal VARCHAR(50) NOT NULL,
    dietary_preference_id INT(6) UNSIGNED,
    FOREIGN KEY (dietary_preference_id) REFERENCES dietary_preferences(id)
);

INSERT INTO dietary_preferences (preference) VALUES ('Vegan');
INSERT INTO dietary_preferences (preference) VALUES ('Vegetarian');
INSERT INTO dietary_preferences (preference) VALUES ('Pescatarian');
INSERT INTO dietary_preferences (preference) VALUES ('None');
INSERT INTO dietary_preferences (preference) VALUES ('Gluten-Free');
INSERT INTO dietary_preferences (preference) VALUES ('Dairy-Free');
INSERT INTO dietary_preferences (preference) VALUES ('Keto');
INSERT INTO dietary_preferences (preference) VALUES ('Paleo');
INSERT INTO dietary_preferences (preference) VALUES ('Low-Carb');
INSERT INTO dietary_preferences (preference) VALUES ('Mediterranean');
