CREATE TABLE IF NOT EXISTS MealPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dayOfWeek VARCHAR(30) NOT NULL,
    mealType VARCHAR(30) NOT NULL,
    dietaryPreference VARCHAR(50),
    mealDescription TEXT,
    reg_date TIMESTAMP
);

INSERT INTO MealPlan (dayOfWeek, mealType, dietaryPreference, mealDescription) VALUES 
('Monday', 'Breakfast', 'Vegan', 'Avocado toast'),
('Tuesday', 'Lunch', 'Vegetarian', 'Quinoa salad'),
('Wednesday', 'Dinner', 'Keto', 'Grilled salmon with asparagus'),
('Thursday', 'Snack', 'Gluten-free', 'Fruit bowl'),
('Friday', 'Breakfast', 'Paleo', 'Egg muffins'),
('Saturday', 'Dinner', 'Plant-based', 'Veggie stir-fry'),
('Sunday', 'Lunch', 'Low-carb', 'Chicken Caesar salad'),
('Monday', 'Meal Prep', 'Vegan', 'Chickpea curry'),
('Tuesday', 'Dinner', 'Vegetarian', 'Eggplant parmesan'),
('Wednesday', 'Breakfast', 'Keto', 'Bulletproof coffee');
