CREATE TABLE IF NOT EXISTS recipes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    directions TEXT NOT NULL,
    dietary_preferences VARCHAR(255),
    REG_DATE TIMESTAMP
);

CREATE TABLE IF NOT EXISTS meal_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(50) NOT NULL,
    recipe_id INT(6) UNSIGNED,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    REG_DATE TIMESTAMP
);

-- Insert 10 values into recipes table
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Spaghetti Carbonara', 'Spaghetti, Eggs, Pancetta, Parmesan Cheese, Black Pepper', '1. Cook spaghetti. 2. Fry pancetta until crispy. 3. Mix eggs, cheese, and pepper. 4. Combine all ingredients.', 'None');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Chicken Stir-Fry', 'Chicken Breast, Bell Peppers, Soy Sauce, Ginger, Garlic, Rice', '1. Marinate chicken. 2. Stir-fry with bell peppers, ginger, and garlic. 3. Serve over rice.', 'Gluten-Free');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Vegetable Curry', 'Mixed Vegetables, Coconut Milk, Curry Paste, Rice', '1. Cook vegetables in curry paste. 2. Add coconut milk. 3. Serve with rice.', 'Vegetarian');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Beef Tacos', 'Ground Beef, Tortillas, Lettuce, Tomatoes, Cheese, Salsa', '1. Cook beef with taco seasoning. 2. Fill tortillas with beef and toppings. 3. Enjoy!', 'None');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Lemon Herb Salmon', 'Salmon Fillets, Lemon, Dill, Garlic, Olive Oil', '1. Marinate salmon in lemon, herbs, and garlic. 2. Bake or grill until cooked. 3. Serve hot.', 'Heart-Healthy');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Mushroom Risotto', 'Arborio Rice, Mushrooms, Parmesan Cheese, Chicken Broth, Onion', '1. Sautee mushrooms, onions. 2. Cook rice with broth. 3. Stir in cheese and mushrooms.', 'Vegetarian');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Greek Salad', 'Lettuce, Cucumbers, Tomatoes, Olives, Feta Cheese, Olive Oil', '1. Chop vegetables. 2. Toss with cheese and olives. 3. Dress with olive oil.', 'Vegetarian');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Pulled Pork Sandwiches', 'Pork Shoulder, BBQ Sauce, Buns, Coleslaw', '1. Slow-cook pork with sauce. 2. Shred. 3. Serve on buns with coleslaw.', 'None');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Quinoa Salad', 'Quinoa, Bell Peppers, Cucumbers, Feta Cheese, Lemon Dressing', '1. Cook quinoa. 2. Mix with chopped vegetables, cheese. 3. Drizzle with lemon dressing.', 'Vegetarian');
INSERT INTO recipes (title, ingredients, directions, dietary_preferences) VALUES ('Chicken Parmesan', 'Chicken Breast, Bread Crumbs, Marinara Sauce, Mozzarella Cheese, Pasta', '1. Bread chicken. 2. Bake with sauce and cheese. 3. Serve over pasta.', 'None');