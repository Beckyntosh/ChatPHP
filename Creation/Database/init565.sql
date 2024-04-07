CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    ingredients TEXT,
    instructions TEXT
);

INSERT INTO recipes (name, ingredients, instructions) 
VALUES ('Recipe A', 'Ingredients of Recipe A', 'Instructions of Recipe A'),
('Recipe B', 'Ingredients of Recipe B', 'Instructions of Recipe B'),
('Recipe C', 'Ingredients of Recipe C', 'Instructions of Recipe C'),
('Recipe D', 'Ingredients of Recipe D', 'Instructions of Recipe D'),
('Recipe E', 'Ingredients of Recipe E', 'Instructions of Recipe E'),
('Recipe F', 'Ingredients of Recipe F', 'Instructions of Recipe F'),
('Recipe G', 'Ingredients of Recipe G', 'Instructions of Recipe G'),
('Recipe H', 'Ingredients of Recipe H', 'Instructions of Recipe H'),
('Recipe I', 'Ingredients of Recipe I', 'Instructions of Recipe I'),
('Recipe J', 'Ingredients of Recipe J', 'Instructions of Recipe J');