CREATE TABLE recipes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    recipe_name VARCHAR(100) NOT NULL,
    ingredients TEXT NOT NULL,
    method TEXT NOT NULL
);

INSERT INTO recipes (recipe_name, ingredients, method) VALUES
('Pasta Carbonara', 'Spaghetti, eggs, pancetta, Parmesan cheese, black pepper', '1. Cook spaghetti according to package instructions. 2. In a bowl, whisk eggs and Parmesan. 3. Cook pancetta until crispy. 4. Drain pasta and add to the pan with pancetta. 5. Remove from heat, add egg mixture, and stir until creamy. 6. Serve with black pepper.'),
('Chicken Alfredo', 'Fettuccine, chicken breast, heavy cream, Parmesan cheese, garlic, butter', '1. Cook pasta according to package instructions. 2. Season chicken and cook until browned. 3. In a separate pan, melt butter and sauté garlic. 4. Add cream and cheese, stir until smooth. 5. Add cooked chicken and pasta. 6. Serve hot.'),
('Vegetable Stir-fry', 'Broccoli, bell peppers, carrots, soy sauce, garlic, ginger, rice', '1. Stir-fry garlic and ginger until fragrant. 2. Add vegetables and cook until tender. 3. Add soy sauce and stir. 4. Serve over steamed rice.'),
('Salmon Teriyaki', 'Salmon fillet, soy sauce, honey, garlic, ginger, sesame seeds, green onions', '1. Marinate salmon in soy sauce, honey, garlic, and ginger. 2. Bake in the oven until cooked. 3. Sprinkle with sesame seeds and green onions. 4. Serve with rice or salad.'),
('Beef Tacos', 'Ground beef, taco seasoning, tortillas, cheese, lettuce, tomatoes, salsa', '1. Cook ground beef with taco seasoning. 2. Warm tortillas in a pan. 3. Fill tortillas with beef, cheese, lettuce, and tomatoes. 4. Top with salsa.'),
('Caprese Salad', 'Tomatoes, fresh mozzarella, basil, olive oil, balsamic vinegar, salt', '1. Slice tomatoes and mozzarella. 2. Layer with basil leaves. 3. Drizzle with olive oil and balsamic vinegar. 4. Sprinkle with salt.'),
('Shrimp Scampi', 'Shrimp, linguine, garlic, butter, white wine, lemon juice, parsley', '1. Cook linguine according to package instructions. 2. Sauté garlic in butter. 3. Add shrimp and cook until pink. 4. Deglaze with wine and lemon juice. 5. Toss in cooked pasta. 6. Garnish with parsley.'),
('Mushroom Risotto', 'Arborio rice, mushrooms, chicken broth, onion, white wine, Parmesan cheese', '1. Sauté onion in butter. 2. Add rice and cook until translucent. 3. Add mushrooms and wine, stir until absorbed. 4. Gradually add broth until rice is cooked. 5. Stir in cheese before serving.'),
('Greek Salad', 'Cucumbers, tomatoes, feta cheese, olives, red onion, olive oil, lemon juice', '1. Chop vegetables and place in a bowl. 2. Add crumbled feta and olives. 3. Drizzle with olive oil and lemon juice. 4. Toss to combine.'),
('Chocolate Cake', 'Flour, sugar, eggs, cocoa powder, butter, milk, vanilla extract', '1. Cream butter and sugar. 2. Add eggs and vanilla. 3. Mix in dry ingredients with milk. 4. Bake in a preheated oven. 5. Cool before serving.');