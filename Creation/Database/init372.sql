CREATE TABLE IF NOT EXISTS user_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  favourite_food VARCHAR(50),
  dietary_restrictions VARCHAR(255),
  bio TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_profiles (username, favourite_food, dietary_restrictions, bio) VALUES 
('Alice', 'Pizza', 'None', 'Loves hiking'),
('Bob', 'Sushi', 'Vegetarian', 'Passionate about art'),
('Charlie', 'Burgers', 'Gluten-free', 'Enjoys playing guitar'),
('David', 'Pasta', 'Vegan', 'Movie buff'),
('Eva', 'Salad', 'Dairy-free', 'Fitness enthusiast'),
('Frank', 'Tacos', 'Nut-free', 'Travel lover'),
('Grace', 'Curry', 'Shellfish allergy', 'Bookworm'),
('Henry', 'Steak', 'Lactose intolerant', 'Tech geek'),
('Ivy', 'Sushi', 'Kosher', 'Animal lover'),
('Jack', 'Burger', 'Halal', 'Outdoor adventurer');