CREATE TABLE IF NOT EXISTS recipes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_name VARCHAR(255) NOT NULL,
recipe_instructions TEXT,
recipe_image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS ingredients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_id INT(6) UNSIGNED,
ingredient_name VARCHAR(255) NOT NULL,
FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

CREATE TABLE IF NOT EXISTS dietary_restrictions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
recipe_id INT(6) UNSIGNED,
restriction VARCHAR(255) NOT NULL,
FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

INSERT INTO recipes (recipe_name, recipe_instructions, recipe_image) VALUES 
('Spaghetti Carbonara', 'Boil spaghetti, fry bacon, mix with egg and cheese sauce', 'spaghetti_carbonara.jpg'),
('Chicken Alfredo', 'Cook chicken, prepare alfredo sauce, serve over pasta', 'chicken_alfredo.jpg'),
('Vegetable Stir-fry', 'Cut vegetables, stir fry with sauce, serve over rice', 'vegetable_stirfry.jpg'),
('Grilled Salmon', 'Season salmon, grill until cooked, serve with lemon', 'grilled_salmon.jpg'),
('Caprese Salad', 'Slice tomatoes and mozzarella, layer with basil, drizzle with balsamic', 'caprese_salad.jpg'),
('Beef Tacos', 'Cook ground beef with seasoning, fill tortillas with beef and toppings', 'beef_tacos.jpg'),
('Mushroom Risotto', 'Saute mushrooms, prepare risotto with mushrooms and cheese', 'mushroom_risotto.jpg'),
('Chicken Caesar Salad', 'Grill chicken, chop romaine, toss with dressing and croutons', 'chicken_caesar_salad.jpg'),
('Spinach and Feta Stuffed Chicken', 'Butterfly chicken, stuff with spinach and feta, bake until cooked', 'spinach_feta_chicken.jpg'),
('Pasta Primavera', 'Boil pasta, saute vegetables, mix with cream sauce and pasta', 'pasta_primavera.jpg');

INSERT INTO ingredients (recipe_id, ingredient_name) VALUES 
(1, 'Spaghetti, Bacon, Eggs, Cheese'),
(2, 'Chicken, Pasta, Cream, Parmesan'),
(3, 'Assorted Vegetables, Rice, Soy Sauce'),
(4, 'Salmon Fillet, Lemon, Olive Oil'),
(5, 'Tomatoes, Mozzarella, Basil, Balsamic'),
(6, 'Ground Beef, Tortillas, Lettuce, Cheese'),
(7, 'Mushrooms, Arborio Rice, Chicken Broth'),
(8, 'Chicken Breast, Romaine Lettuce, Caesar Dressing'),
(9, 'Chicken Breast, Spinach, Feta Cheese'),
(10, 'Pasta, Assorted Vegetables, Cream');

INSERT INTO dietary_restrictions (recipe_id, restriction) VALUES 
(1, 'None'),
(2, 'None'),
(3, 'Vegetarian'),
(4, 'None'),
(5, 'Vegetarian'),
(6, 'None'),
(7, 'Vegetarian'),
(8, 'None'),
(9, 'None'),
(10, 'Vegetarian');
