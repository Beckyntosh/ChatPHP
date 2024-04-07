CREATE TABLE IF NOT EXISTS meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
recipe_id INT(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS recipes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT,
dietary_preferences VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 1', 'Description for Recipe 1', 'Vegetarian');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 2', 'Description for Recipe 2', 'Gluten-Free');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 3', 'Description for Recipe 3', 'Keto');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 4', 'Description for Recipe 4', 'Paleo');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 5', 'Description for Recipe 5', 'Low-Carb');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 6', 'Description for Recipe 6', 'Vegan');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 7', 'Description for Recipe 7', 'High-Protein');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 8', 'Description for Recipe 8', 'Low-Fat');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 9', 'Description for Recipe 9', 'Dairy-Free');
INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Recipe 10', 'Description for Recipe 10', 'Nut-Free');
