CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, name, email, password) VALUES 
('john_doe', 'John Doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'pass456'),
('mark_jackson', 'Mark Jackson', 'mark.jackson@example.com', 'letmein'),
('sara_williams', 'Sara Williams', 'sara.williams@example.com', 'abc@123'),
('mike_brown', 'Mike Brown', 'mike.brown@example.com', 'secret123');

INSERT INTO recipes (user_id, title, description, ingredients, steps, image) VALUES
(1, 'Spaghetti Carbonara', 'A classic Italian pasta dish with bacon and eggs', 'Spaghetti, Bacon, Eggs, Parmesan Cheese, Black Pepper', '1. Cook spaghetti in boiling water 2. Fry bacon until crispy 3. Beat eggs with cheese 4. Mix all ingredients together', 'spaghetti_carbonara.jpg'),
(2, 'Chicken Alfredo', 'Creamy pasta dish with grilled chicken', 'Fettuccine, Chicken Breast, Heavy Cream, Parmesan Cheese, Garlic, Salt, Pepper', '1. Cook fettuccine 2. Grill chicken breast 3. Mix cream, cheese, garlic 4. Combine all', 'chicken_alfredo.jpg'),
(3, 'Chocolate Cake', 'Decadent and rich chocolate cake', 'Flour, Sugar, Cocoa Powder, Baking Powder, Baking Soda, Eggs, Milk, Oil', '1. Mix dry ingredients 2. Beat eggs, milk, oil 3. Combine and bake', 'chocolate_cake.jpg'),
(4, 'Caesar Salad', 'Classic salad with romaine lettuce and Caesar dressing', 'Romaine Lettuce, Caesar Dressing, Parmesan Cheese, Croutons', '1. Chop lettuce 2. Toss with dressing 3. Add cheese and croutons', 'caesar_salad.jpg'),
(5, 'Tacos', 'Mexican dish with seasoned meat in tortillas', 'Ground Beef, Taco Seasoning, Tortillas, Lettuce, Tomato, Cheese', '1. Cook beef with seasoning 2. Fill tortillas with meat and toppings', 'tacos.jpg');
