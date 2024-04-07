CREATE TABLE IF NOT EXISTS DietaryPreferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL
    );
INSERT INTO DietaryPreferences (preference) VALUES ('Vegan'), ('Vegetarian'), ('Keto'), ('Gluten-Free'), ('Paleo'), ('Low-Carb'), ('Low-Fat'), ('Dairy-Free'), ('Nut-Free'), ('Pescatarian');

CREATE TABLE IF NOT EXISTS Meals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    meal_name VARCHAR(50),
    day_of_week VARCHAR(10),
    dietary_preference_id INT(6),
    FOREIGN KEY (dietary_preference_id) REFERENCES DietaryPreferences(id)
    );
INSERT INTO Meals (meal_name, day_of_week, dietary_preference_id) VALUES ('Breakfast Smoothie', 'Monday', 1), ('Quinoa Salad', 'Tuesday', 2), ('Keto Burger', 'Wednesday', 3), ('Gluten-Free Pasta', 'Thursday', 4), ('Paleo Stir Fry', 'Friday', 5), ('Low-Carb Pizza', 'Saturday', 6), ('Low-Fat Salad', 'Sunday', 7), ('Dairy-Free Curry', 'Monday', 8), ('Nut-Free Oatmeal', 'Tuesday', 9), ('Pescatarian Tacos', 'Wednesday', 10);