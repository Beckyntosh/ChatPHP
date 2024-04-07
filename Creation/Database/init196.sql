CREATE TABLE IF NOT EXISTS DietaryPreferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    dietary_preference_id INT,
    FOREIGN KEY (dietary_preference_id) REFERENCES DietaryPreferences(id)
);

INSERT INTO DietaryPreferences (preference) VALUES 
('vegan'),
('vegetarian'),
('pescatarian'),
('gluten-free'),
('dairy-free'),
('nut-free'),
('sugar-free'),
('keto'),
('paleo'),
('low-carb');
