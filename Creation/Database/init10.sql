CREATE TABLE recipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    dietary_preference VARCHAR(50) NOT NULL
);

CREATE TABLE ingredients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE recipe_ingredients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT NOT NULL,
    ingredient_id INT NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredients(id)
);

INSERT INTO recipes (name, description, dietary_preference) VALUES
('Recipe 1', 'Description for Recipe 1', 'Vegetarian'),
('Recipe 2', 'Description for Recipe 2', 'Vegan'),
('Recipe 3', 'Description for Recipe 3', 'Gluten-Free'),
('Recipe 4', 'Description for Recipe 4', 'Vegetarian'),
('Recipe 5', 'Description for Recipe 5', 'Vegan'),
('Recipe 6', 'Description for Recipe 6', 'Gluten-Free'),
('Recipe 7', 'Description for Recipe 7', 'Vegetarian'),
('Recipe 8', 'Description for Recipe 8', 'Vegan'),
('Recipe 9', 'Description for Recipe 9', 'Gluten-Free'),
('Recipe 10', 'Description for Recipe 10', 'Vegetarian');

INSERT INTO ingredients (name) VALUES
('Ingredient 1'),
('Ingredient 2'),
('Ingredient 3'),
('Ingredient 4'),
('Ingredient 5'),
('Ingredient 6'),
('Ingredient 7'),
('Ingredient 8'),
('Ingredient 9'),
('Ingredient 10');

INSERT INTO recipe_ingredients (recipe_id, ingredient_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);
